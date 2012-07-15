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
 * Result class for `hg parents`
 *
 * @see     http://selenic.com/hg/help/parents
 * @package libhg.Command.Parents
 */
class libhg_Command_Parents_Result extends libhg_Command_ChangegroupResult {
	/**
	 * get first parent
	 *
	 * @return libhg_Changeset
	 */
	public function first() {
		return reset($this->changesets);
	}

	/**
	 * get second parent
	 *
	 * @return libhg_Changeset  changeset or null
	 */
	public function second() {
		return count($this->changesets) > 1 ? $this->changesets[1] : null;
	}
}
