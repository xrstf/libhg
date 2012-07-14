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
 * Result class for `hg bookmarks`
 *
 * @see     http://selenic.com/hg/help/bookmarks
 * @package libhg.Command.Bookmarks
 */
class libhg_Command_Bookmarks_Result extends libhg_Command_BaseResult {
	/**
	 * list of bookmarks
	 *
	 * @var array
	 */
	public $bookmarks;

	/**
	 * Constructor
	 *
	 * @param array $bookmarks  list of bookmarks
	 * @param int   $code       command's return code
	 */
	public function __construct(array $bookmarks, $code) {
		parent::__construct($code);
		$this->bookmarks = $bookmarks;
	}

	public function getActive() {
		foreach ($this->bookmarks as $bkmrk) {
			if ($bkmrk['active']) return $bkmrk;
		}

		return null;
	}

	public function getActiveName() {
		$active = $this->getActive();
		return $active ? $active['name'] : null;
	}

	public function getActiveChangeset() {
		$active = $this->getActive();
		return $active ? $active['changeset'] : null;
	}
}
