<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Log_Result {
	public $changesets;
	public $code;

	public function __construct(array $changesets, $code) {
		$this->changesets = $changesets;
		$this->code       = $code;
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
