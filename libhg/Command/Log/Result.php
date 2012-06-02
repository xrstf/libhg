<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Log_Result {
	public $files;

	public function __construct(array $files) {
		$this->files = $files;
	}

	public static function parseOutput($output, libhg_Command_Log_Cmd $cmd) {
		$files = explode("\n", $output);
		return new self($files);
	}
}
