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
 * Result class for `hg commit`
 *
 * @see http://selenic.com/hg/help/commit
 */
class libhg_Command_Commit_Result extends libhg_Command_BaseResult {
	/**
	 * command output
	 *
	 * @var string
	 */
	public $output;

	/**
	 * Constructor
	 *
	 * @param string $output  command output
	 * @param int    $code    command's return code
	 */
	public function __construct($output, $code) {
		$this->output = $output;
		$this->code   = $code;
	}
}
