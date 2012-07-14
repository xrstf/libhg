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
 * Result class for `hg log`
 *
 * @see     http://selenic.com/hg/help/log
 * @package libhg.Command.Log
 */
class libhg_Command_Log_Result extends libhg_Command_BaseResult {
	public $changesets;

	public function __construct(array $changesets, $code) {
		parent::__construct($code);
		$this->changesets = $changesets;
	}

	public function getNodes() {
		return $this->getChangesetProperty('node');
	}

	public function getChangesetProperty($prop) {
		$result = array();

		foreach ($this->changesets as $changeset) {
			$result[] = $changeset->$prop;
		}

		return $result;
	}
}
