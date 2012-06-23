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
 * Generated result class for `hg clone`
 *
 * @generated
 * @see http://selenic.com/hg/help/clone
 */
class libhg_Command_Clone_Result extends libhg_Command_BaseResult {
	/**
	 * command output
	 *
	 * @var string
	 */
	public $output;

	public function __construct($output, $code) {
		parent::__construct($code);
		$this->output = $output;
	}
}
