<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Stream implements libhg_Stream_Readable, libhg_Stream_Writable {
	private $fp;
	private $open;
	private $channel;

	const STDIN  = 0;
	const STDOUT = 1;
	const STDERR = 2;

	const CHANNEL_OUTPUT = 'o';
	const CHANNEL_ERROR  = 'e';
	const CHANNEL_RESULT = 'r';
	const CHANNEL_DEBUG  = 'd';
	const CHANNEL_INPUT  = 'I';
	const CHANNEL_LINE   = 'L';

	public function __construct($stream) {
		if (!is_resource($stream)) {
			throw new libhg_Exception('$stream must be a valid stream.');
		}

		$this->fp      = $stream;
		$this->open    = true;
		$this->channel = null;
	}

	public function close() {
		if (!$this->open) return false;
		fclose($this->fp);

		$this->open    = false;
		$this->channel = null;

		return true;
	}

	public function isOpen() {
		return $this->open;
	}

	public function getChannel() {
		return $this->channel;
	}

	protected function stopIfClosed() {
		if (!$this->open) throw new libhg_Exception('This stream is not opened anymore.');
	}

	protected function dumpBytes($bytes) {
		$bytes = str_split($bytes);

		foreach ($bytes as $idx => $byte) {
			$bytes[$idx] = sprintf('x%02s', dechex(ord($byte)));
		}

		return implode('', $bytes);
	}

	public function read($bytes) {
		$this->stopIfClosed();
		return fread($this->fp, $bytes);
	}

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

	public function hasOutput() {
		return $this->readChannel() === self::CHANNEL_OUTPUT;
	}

	public function readString($channel) {
		$data = array();

		while ($this->readChannel() === $channel) {
			$size   = $this->readInt();
			$data[] = $this->read($size);
		}

		return implode('', $data);
	}

	public function readReturnValue($readChannelIdentifier = false) {
		$channel = $readChannelIdentifier ? $this->readChannel() : $this->getChannel();

		if ($channel !== self::CHANNEL_RESULT) {
			throw new libhg_Exception('Expected result channel, but found "'.$channel.'".');
		}

		// ignored size (only required by protocol design, return code is always a 4byte integer)
		$size = $this->readInt();

		return $this->readInt();
	}

	public function expectOutput() {
		return $this->expectChannels(array(self::CHANNEL_OUTPUT));
	}

	public function expectChannels(array $channels) {
		$channel = $this->readChannel();

		if (!in_array($channel, $channels)) {
			throw new libhg_Exception('Unexpected channel "'.$this->dumpBytes($channel).'" given.');
		}

		return $channel;
	}

	public function expectReturnCode(array $channels) {
		$channel = $this->readChannel();

		if (!in_array($channel, $channels)) {
			throw new libhg_Exception('Unexpected channel "'.$this->dumpBytes($channel).'" given.');
		}

		return $channel;
	}

	public function readInt() {
		$bytes = $this->read(4);

		if (strlen($bytes) !== 4) {
			throw new libhg_Exception('Unexpected size "'.bin2hex($bytes).'" found.');
		}

		return hexdec(bin2hex($bytes));
	}

	public function write($bytes) {
		$this->stopIfClosed();
		return fwrite($this->fp, $bytes);
	}

	public function writeInt($int) {
		return $this->write(pack('N', $int));
	}
}
