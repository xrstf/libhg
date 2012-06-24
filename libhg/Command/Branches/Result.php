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
 * Result class for `hg branches`
 *
 * @see     http://selenic.com/hg/help/branches
 * @package libhg.Command.Branches
 */
class libhg_Command_Branches_Result extends libhg_Command_BaseResult {
	/**
	 * list of bookmarks
	 *
	 * @var array
	 */
	public $branches;

	/**
	 * Constructor
	 *
	 * @param array $branches  list of branches
	 * @param int   $code      command's return code
	 */
	public function __construct(array $branches, $code) {
		parent::__construct($code);
		$this->branches = $branches;
	}
}
