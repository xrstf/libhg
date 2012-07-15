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
 * Result class for `hg rename`
 *
 * @see     http://selenic.com/hg/help/rename
 * @package libhg.Command.Rename
 */
class libhg_Command_Rename_Result extends libhg_Command_BaseResult {
	/**
	 * rename operations
	 *
	 * Each element contains either a single 'text' element (if the line could
	 * not be matched) or both 'from' and 'to'. Notice that the detection is
	 * not perfect and can generate false information if filenames contain the
	 * string ' to '.
	 *
	 * @var array
	 */
	public $files;

	/**
	 * Constructor
	 *
	 * @param array $files  list of rename operations
	 * @param int   $code   command's return code
	 */
	public function __construct(array $files, $code) {
		parent::__construct($code);
		$this->files = $files;
	}
}
