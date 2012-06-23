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
 * Result class for `hg branch`
 *
 * @see http://selenic.com/hg/help/branch
 */
class libhg_Command_Branch_Result extends libhg_Command_BaseResult {
	/**
	 * current branch name (after possibly changing it)
	 *
	 * @var string
	 */
	public $branch;

	/**
	 * Constructor
	 *
	 * @param string $branch  current branch name
	 * @param int    $code    command's return code
	 */
	public function __construct($branch, $code) {
		parent::__construct($code);
		$this->branch = $branch;
	}
}
