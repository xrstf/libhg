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
 * Generated result class for `hg grep`
 *
 * @see       http://selenic.com/hg/help/grep
 * @generated 2012-06-08 02:30
 */
class libhg_Command_Grep_Result {
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

	/**
	 * Constructor
	 *
	 * @param string $output  command's output
	 * @param int    $code    command's return code
	 */
	public function __construct($output, $code) {
		$this->output = $output;
		$this->code   = $code;
	}
}
