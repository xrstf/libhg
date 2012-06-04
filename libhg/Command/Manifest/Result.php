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
 * Generated result class for `hg manifest`
 *
 * @see       http://selenic.com/hg/help/manifest
 * @generated 2012-06-04 04:09
 */
class libhg_Command_Manifest_Result {
	/**
	 * command output
	 *
	 * @var string
	 */
	public $output;

	/**
	 * command return code
	 *
	 * @var int
	 */
	public $code;

	public function __construct($output, $code) {
		$this->output = $output;
		$this->code   = $code;
	}
}
