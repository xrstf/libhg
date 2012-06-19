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
 * Result class for `hg addremove`
 *
 * @see http://selenic.com/hg/help/addremove
 */
class libhg_Command_Addremove_Result {
	/**
	 * added files
	 *
	 * @var array
	 */
	public $added;

	/**
	 * removed files
	 *
	 * @var array
	 */
	public $removed;

	/**
	 * rename ops: [{from: ..., to: ..., sim: 12}, {from: ..., to: ..., sim: ...}, ...]
	 *
	 * @var array
	 */
	public $renames;

	/**
	 * command return code
	 *
	 * @var int
	 */
	public $code;

	/**
	 * Constructor
	 *
	 * @param array $added    list of added files
	 * @param array $removed  list of removed files
	 * @param array $renames  list of renames
	 * @param int   $code     command's return code
	 */
	public function __construct(array $added, array $removed, array $renames, $code) {
		$this->added   = $added;
		$this->removed = $removed;
		$this->renames = $renames;
		$this->code    = $code;
	}
}
