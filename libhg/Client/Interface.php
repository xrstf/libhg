<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

interface libhg_Client_Interface {
	public function connect();
	public function close();
	public function getCapabilities();
	public function getOptions();
	public function getWritableStream();
	public function getReadableStream();
	public function isConnected();
	public function run(libhg_Command_Interface $command);
}
