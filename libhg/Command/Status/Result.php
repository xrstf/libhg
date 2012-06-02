<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Status_Result {
	public $output;
	public $retval;

	public function __construct($output, $retval) {
		$this->output = trim(implode('', $output));
		$this->retval = $retval;
	}
}