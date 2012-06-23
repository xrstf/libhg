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
 * Result class for `hg cat`
 *
 * @see http://selenic.com/hg/help/cat
 */
class libhg_Command_Cat_Result extends libhg_Command_BaseResult {
	/**
	 * cat output
	 *
	 * @var string
	 */
	public $text;

	public function __construct($text, $code) {
		parent::__construct($code);
		$this->text = $text;
	}
}
