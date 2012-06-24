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
 * Stream that supports reading data from it
 *
 * @package libhg.Stream
 */
interface libhg_Stream_Readable {
	/**
	 * Read N bytes
	 *
	 * @param  int $bytes  number of bytes to read
	 * @return string      read bytes
	 */
	public function read($bytes);

	/**
	 * read 4 byte integer
	 *
	 * @return int
	 */
	public function readInt();

	/**
	 * Read channel identifier
	 *
	 * @throws libhg_Exception  if invalid or error channel was read
	 * @return string           channel identifier
	 */
	public function readChannel();

	/**
	 * checks if the next channel is the output channel
	 *
	 * @return string  channel
	 */
	public function expectOutput();

	/**
	 * checks the next channel
	 *
	 * @throws libhg_Exception  if an unexpected channel was read
	 * @param  array $channels  allowed channels
	 * @return string           channel
	 */
	public function expectChannels(array $channels);

	/**
	 * get current channel
	 *
	 * The channel is reset everytime readChannel() (and only readChannel()) is
	 * called.
	 *
	 * @return string
	 */
	public function getChannel();

	/**
	 * checks if the next channel is the output channel
	 *
	 * @return boolean
	 */
	public function hasOutput();

	/**
	 * read string
	 *
	 * @param  string $channel
	 * @return string
	 */
	public function readString($channel);

	/**
	 * read return value
	 *
	 * @throws libhg_Exception  if found channel is not the result channel
	 * @param  boolean $readChannelIdentifier
	 * @return int
	 */
	public function readReturnValue();
}
