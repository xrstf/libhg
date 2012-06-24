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
 * Result class for `hg annotate`
 *
 * @see     http://selenic.com/hg/help/annotate
 * @package libhg.Command.Annotate
 */
class libhg_Command_Annotate_Result extends libhg_Command_BaseResult {
	/**
	 * annotation
	 *
	 * @var string
	 */
	public $text;

	/**
	 * Constructor
	 *
	 * @param string $text  command output
	 * @param int    $code  command's return code
	 */
	public function __construct($text, $code) {
		parent::__construct($code);
		$this->text = $text;
	}
}
