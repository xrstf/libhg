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
 * Result class for changeset lists
 *
 * @package libhg.Command
 */
class libhg_Command_ChangegroupResult extends libhg_Command_BaseResult {
	/**
	 * changesets returned by the command
	 *
	 * @var array
	 */
	public $changesets;

	/**
	 * constructor
	 *
	 * @param array $changesets  list of libhg_Changeset objects
	 * @param int   $code        command's return code
	 */
	public function __construct(array $changesets, $code) {
		parent::__construct($code);
		$this->changesets = $changesets;
	}

	public function isEmpty() {
		return empty($this->changesets);
	}

	public function getNodes() {
		return $this->getChangesetProperty('node');
	}

	public function getChangesetProperties($prop) {
		$result = array();

		foreach ($this->changesets as $changeset) {
			$result[] = $changeset->$prop;
		}

		return $result;
	}
}
