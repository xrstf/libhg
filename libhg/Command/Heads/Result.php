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
 * Result class for `hg heads`
 *
 * @see     http://selenic.com/hg/help/heads
 * @package libhg.Command.Heads
 */
class libhg_Command_Heads_Result extends libhg_Command_BaseResult {
	/**
	 * list of heads (libhg_Changeset objects)
	 *
	 * @var array
	 */
	public $heads;

	public function __construct(array $heads, $code) {
		parent::__construct($code);
		$this->heads = $heads;
	}

	public function getNodes() {
		return $this->getHeadProperty('node');
	}

	public function getHeadProperty($prop) {
		$result = array();

		foreach ($this->heads as $head) {
			$result[] = $head->$prop;
		}

		return $result;
	}
}
