<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Archive_Result {
	public $text;
	public $code;

	public function __construct($text, $code) {
		$this->text = $text;
		$this->code = $code;
	}
}