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
 * Result class for `hg identify`
 *
 * @see     http://selenic.com/hg/help/identify
 * @package libhg.Command.Identify
 */
class libhg_Command_Identify_Result extends libhg_Command_BaseResult {
	/**
	 * the working copy's parent if not rev was given, else the found changeset
	 *
	 * @var boolean
	 */
	public $parent;

	/**
	 * true if the working copy is not clean
	 *
	 * @var boolean
	 */
	public $dirty;

	/**
	 * Constructor
	 *
	 * @param libhg_Changeset $parent  parent changeset
	 * @param boolean         $dirty   whether the working copy is dirty or not
	 * @param int             $code    command's return code
	 */
	public function __construct(libhg_Changeset $parent, $dirty, $code) {
		parent::__construct($code);

		$this->parent = $parent;
		$this->dirty  = (boolean) $dirty;
	}
}
