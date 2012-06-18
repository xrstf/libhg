<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Addremove_Result {
	public $files;
	public $code;

	public function __construct(array $files, $code) {
		$this->files = $files;
		$this->code  = $code;
	}
}
