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
 * Result class for `hg summary`
 *
 * @generated
 * @see     http://selenic.com/hg/help/summary
 * @package libhg.Command.Summary
 */
class libhg_Command_Summary_Result {
	public $parents;
	public $branch;
	public $status;
	public $update;
	public $remote;
	public $retval;

	public function __construct(array $parents, $branch, $status, $update, array $bookmarks, $remote, $retval) {
		$this->parents   = $parents;
		$this->branch    = $branch;
		$this->status    = $status;
		$this->update    = $update;
		$this->bookmarks = $bookmarks;
		$this->remote    = $remote;
		$this->retval    = $retval;
	}

	public function first() {
		return $this->parents[0];
	}
}
