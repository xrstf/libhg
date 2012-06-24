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
 * Result class for `hg commit`
 *
 * @see http://selenic.com/hg/help/commit
 */
class libhg_Command_Commit_Result extends libhg_Command_BaseResult {
	/**
	 * the changeset created by committing
	 *
	 * @var libhg_Changeset
	 */
	public $changeset;

	/**
	 * Constructor
	 *
	 * @param libhg_Changeset $changeset  the changeset created by committing
	 */
	public function __construct(libhg_Changeset $changeset) {
		parent::__construct(self::SUCCESS);
		$this->changeset = $changeset;
	}
}
