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
 * Generated result class for `hg tags`
 *
 * @generated
 * @see     http://selenic.com/hg/help/tags
 * @package libhg.Command.Tags
 */
class libhg_Command_Tags_Result {
	/**
	 * tag list: {tagname: changeset-object, tagname: changeset-object, ...}
	 *
	 * @var array
	 */
	public $tags;

	/**
	 * command return code
	 *
	 * @var int
	 */
	public $code;

	/**
	 * Constructor
	 *
	 * @param array $tags  parsed tag list
	 * @param int   $code  command's return code
	 */
	public function __construct($tags, $code) {
		$this->tags = $tags;
		$this->code = $code;
	}
}
