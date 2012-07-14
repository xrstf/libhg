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
 * Generated result class for `hg convert`
 *
 * @see     http://selenic.com/hg/help/convert
 * @package libhg.Command.Convert
 */
class libhg_Command_Convert_Result extends libhg_Command_BaseResult {
	/**
	 * the repository created by converting
	 *
	 * @var libhg_Repository
	 */
	public $dest;

	/**
	 * Constructor
	 *
	 * @param libhg_Repository $destination  the repository created by converting
	 */
	public function __construct(libhg_Repository $destination = null) {
		parent::__construct(self::SUCCESS);
		$this->dest = $dest;
	}
}
