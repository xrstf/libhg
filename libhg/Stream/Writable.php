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
 * Stream that supports writing data to it
 *
 * @package libhg.Stream
 */
interface libhg_Stream_Writable {
	/**
	 * write N bytes
	 *
	 * @param  string $bytes
	 * @return int            number of written bytes
	 */
	public function write($bytes);

	/**
	 * write an integer
	 *
	 * @param  int $int
	 * @return boolean
	 */
	public function writeInt($int);
}
