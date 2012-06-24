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
 * Base class for most results
 *
 * @package libhg.Command
 */
class libhg_Command_BaseResult {
	public $code;

	const SUCCESS = 0;
	const ERROR   = 1;

	public function __construct($code) {
		$this->code = (int) $code;
	}

	public function isSuccess() {
		return $this->code === self::SUCCESS;
	}

	public function isError() {
		return !$this->isSuccess();
	}
}
