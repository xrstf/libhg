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
 * Result class for `hg merge`
 *
 * @see     http://selenic.com/hg/help/merge
 * @package libhg.Command.Merge
 */
class libhg_Command_Merge_Result extends libhg_Command_BaseResult {
	/**
	 * command output (only set if preview flag was set)
	 *
	 * @var string
	 */
	public $output;

	/**
	 * Constructor
	 *
	 * @param string $output  command's output
	 * @param int    $code    command's return code
	 */
	public function __construct($output, $code) {
		parent::__construct($code);
		$this->output = $output;
	}
}
