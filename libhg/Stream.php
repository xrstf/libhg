<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

/**
 * Basic stream class with some helpers
 */
class libhg_Stream implements libhg_Stream_Readable, libhg_Stream_Writable {
	private $fp;      ///< resource
	private $open;    ///< boolean
	private $channel; ///< string
	private $buffer;  ///< string

	const STDIN  = 0; ///< int
	const STDOUT = 1; ///< int
	const STDERR = 2; ///< int

	const CHANNEL_OUTPUT = 'o'; ///< string
	const CHANNEL_ERROR  = 'e'; ///< string
	const CHANNEL_RESULT = 'r'; ///< string
	const CHANNEL_DEBUG  = 'd'; ///< string
	const CHANNEL_INPUT  = 'I'; ///< string
	const CHANNEL_LINE   = 'L'; ///< string

	/**
	 * Constructor
	 *
	 * @param resource $stream  stdin or stdout
	 */
	public function __construct($stream) {
		if (!is_resource($stream)) {
			throw new libhg_Exception('$stream must be a valid stream.');
		}

		$this->fp      = $stream;
		$this->open    = true;
		$this->channel = null;
		$this->buffer  = '';
	}

	/**
	 * close stream
	 *
	 * @return boolean
	 */
	public function close() {
		if (!$this->open) return false;
		fclose($this->fp);

		$this->open    = false;
		$this->channel = null;
		$this->buffer  = '';

		return true;
	}

	/**
	 * check if stream is opened
	 *
	 * @return boolean
	 */
	public function isOpen() {
		return $this->open;
	}

	/**
	 * get current channel
	 *
	 * The channel is reset everytime readChannel() (and only readChannel()) is
	 * called.
	 *
	 * @return string
	 */
	public function getChannel() {
		return $this->channel;
	}

	/**
	 * throw exception if closed
	 *
	 * @throws libhg_Exception
	 */
	protected function stopIfClosed() {
		if (!$this->open) throw new libhg_Exception('This stream is not opened anymore.');
	}

	/**
	 * dump bytes to hex representation
	 *
	 * @param  string $bytes  input bytes
	 * @return string         hex representation
	 */
	protected function dumpBytes($bytes) {
		$bytes = str_split($bytes);

		foreach ($bytes as $idx => $byte) {
			$bytes[$idx] = sprintf('x%02s', dechex(ord($byte)));
		}

		return implode('', $bytes);
	}

	/**
	 * Read N bytes
	 *
	 * @param  int $bytes  number of bytes to read
	 * @return string      read bytes
	 */
	public function read($bytes) {
		$this->stopIfClosed();
		return fread($this->fp, $bytes);
	}

	/**
	 * Read channel identifier
	 *
	 * @throws libhg_Exception  if invalid or error channel was read
	 * @return string           channel identifier
	 */
	public function readChannel() {
		$byte     = $this->read(1);
		$channels = array(self::CHANNEL_OUTPUT, self::CHANNEL_ERROR, self::CHANNEL_RESULT, self::CHANNEL_DEBUG, self::CHANNEL_INPUT, self::CHANNEL_LINE);

		if (!in_array($byte, $channels)) {
			throw new libhg_Exception('Unknown channel "'.$this->dumpBytes($byte).'" given.');
		}

		$this->channel = $byte;

		if ($byte === self::CHANNEL_ERROR) {
			$len = $this->readInt();
			$msg = $this->read($len);

			throw new libhg_Exception(trim($msg));
		}

		return $byte;
	}

	/**
	 * checks if the next channel is the output channel
	 *
	 * @return boolean
	 */
	public function hasOutput() {
		return $this->readChannel() === self::CHANNEL_OUTPUT;
	}

	/**
	 * read string until delimiter was found
	 *
	 * @param  string $endString  the string to find
	 * @return string             found string, including the $endString
	 */
	public function readUntil($endString) {
		if ($this->channel !== self::CHANNEL_OUTPUT) {
			return null;
		}

		$data   = $this->buffer;
		$lenEnd = mb_strlen($endString);

		// does the buffer contain enough data to fulfill the request?
		if (mb_strlen($data) >= $lenEnd) {
			$pos = mb_strpos($data, $endString);

			// found delimiter
			if ($pos !== false) {
				$this->buffer = mb_substr($data, $pos+$lenEnd);
				return mb_substr($data, 0, $pos+$lenEnd);
			}
		}

		$this->buffer = '';

		while ($this->readChannel() === self::CHANNEL_OUTPUT) {
			$size  = $this->readInt();
			$chunk = $this->read($size);
			$data .= $chunk;

			if (mb_strlen($data) >= $lenEnd) {
				$pos = mb_strpos($data, $endString);

				// found delimiter
				if ($pos !== false) {
					$this->buffer = mb_substr($data, $pos+$lenEnd);
					return mb_substr($data, 0, $pos+$lenEnd);
				}
			}
		}

		return $data;
	}

	/**
	 * read string
	 *
	 * @param  string $channel
	 * @return string
	 */
	public function readString($channel) {
		$data = array();

		while ($this->readChannel() === $channel) {
			$size   = $this->readInt();
			$data[] = $this->read($size);
		}

		return implode('', $data);
	}

	/**
	 * read return value
	 *
	 * @throws libhg_Exception  if found channel is not the result channel
	 * @param  boolean $readChannelIdentifier
	 * @return int
	 */
	public function readReturnValue($readChannelIdentifier = false) {
		$channel = $readChannelIdentifier ? $this->readChannel() : $this->getChannel();

		if ($channel !== self::CHANNEL_RESULT) {
			throw new libhg_Exception('Expected result channel, but found "'.$channel.'".');
		}

		// ignored size (only required by protocol design, return code is always a 4byte integer)
		$size = $this->readInt();

		return $this->readInt();
	}

	/**
	 * checks if the next channel is the output channel
	 *
	 * @return string  channel
	 */
	public function expectOutput() {
		return $this->expectChannels(array(self::CHANNEL_OUTPUT));
	}

	/**
	 * checks the next channel
	 *
	 * @throws libhg_Exception  if an unexpected channel was read
	 * @param  array $channels  allowed channels
	 * @return string           channel
	 */
	public function expectChannels(array $channels) {
		$channel = $this->readChannel();

		if (!in_array($channel, $channels)) {
			throw new libhg_Exception('Unexpected channel "'.$this->dumpBytes($channel).'" given.');
		}

		return $channel;
	}

	/**
	 * read 4 byte integer
	 *
	 * @return int
	 */
	public function readInt() {
		$bytes = $this->read(4);

		if (strlen($bytes) !== 4) {
			throw new libhg_Exception('Unexpected size "'.bin2hex($bytes).'" found.');
		}

		return hexdec(bin2hex($bytes));
	}

	/**
	 * write N bytes
	 *
	 * @param  string $bytes
	 * @return int            number of written bytes
	 */
	public function write($bytes) {
		$this->stopIfClosed();
		return fwrite($this->fp, $bytes);
	}

	/**
	 * write an integer
	 *
	 * @param  int $int
	 * @return boolean
	 */
	public function writeInt($int) {
		return $this->write(pack('N', $int)) === 4;
	}
}
