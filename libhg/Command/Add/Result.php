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
 * Result class for `hg add`
 *
 * @see     http://selenic.com/hg/help/add
 * @package libhg.Command.Add
 */
class libhg_Command_Add_Result extends libhg_Command_BaseResult {
	/**
	 * added files
	 *
	 * @var array
	 */
	public $files;

	/**
	 * Constructor
	 *
	 * @param array $files  list of added files
	 * @param int   $code   command's return code
	 */
	public function __construct(array $files, $code) {
		parent::__construct($code);
		$this->files = $files;
	}
}
