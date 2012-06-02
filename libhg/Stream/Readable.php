<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

interface libhg_Stream_Readable {
	public function read($bytes);
	public function readInt();
	public function readChannel();

	public function expectOutput();
	public function expectChannels(array $channels);

	public function getChannel();
}
