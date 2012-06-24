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
 * Generated result class for `hg verify`
 *
 * @generated
 * @see     http://selenic.com/hg/help/verify
 * @package libhg.Command.Verify
 */
class libhg_Command_Verify_Result {
	const VALID  = 0;
	const BROKEN = 1;

	/**
	 * repository status (valid or broken)
	 *
	 * @var int
	 */
	public $status;

	/**
	 * error if status = broken
	 *
	 * @var string
	 */
	public $error;

	/**
	 * Constructor
	 *
	 * @param int    $status  BROKEN oder VALID
	 * @param string $error   error message if BROKEN
	 */
	public function __construct($status, $error = null) {
		$this->status = $status;
		$this->error  = $error;
	}

	public function isBroken() {
		return $this->status === self::BROKEN;
	}

	public function isValid() {
		return !$this->isBroken();
	}
}
