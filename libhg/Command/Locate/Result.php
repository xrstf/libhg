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
 * Result class for `hg locate`
 *
 * @see     http://selenic.com/hg/help/locate
 * @package libhg.Command.Locate
 */
class libhg_Command_Locate_Result extends libhg_Command_BaseResult {
	/**
	 * list of found files, can be full paths if -f was given
	 *
	 * @var array
	 */
	public $filenames;

	/**
	 * Constructor
	 *
	 * @param array $filenames  list of found files
	 * @param int   $code       command's return code
	 */
	public function __construct(array $filenames, $code) {
		parent::__construct($code);
		$this->filenames = $filenames;
	}
}
