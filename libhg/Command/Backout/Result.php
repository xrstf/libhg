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
 * Result class for `hg backout`
 *
 * @see http://selenic.com/hg/help/backout
 */
class libhg_Command_Backout_Result extends libhg_Command_BaseResult {
	const CLEAN = 0;
	const DIRTY = 1;

	protected $status;
	protected $changeset;

	public function __construct($status, libhg_Changeset $changeset = null) {
		parent::__construct(self::SUCCESS);

		$this->status    = $status;
		$this->changeset = $changeset;
	}

	public function isClean() {
		return $this->status === self::CLEAN;
	}

	public function isDirty() {
		return !$this->isClean();
	}
}
