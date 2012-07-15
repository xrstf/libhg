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
 * Result class for `hg paths`
 *
 * @see     http://selenic.com/hg/help/paths
 * @package libhg.Command.Paths
 */
class libhg_Command_Paths_Result extends libhg_Command_BaseResult {
	/**
	 * parsed paths
	 *
	 * @var libhg_Hgrc
	 */
	public $paths;

	/**
	 * Constructor
	 *
	 * @param libhg_Hgrc $paths  parsed paths
	 * @param int        $code   command's return code
	 */
	public function __construct(libhg_Hgrc $paths, $code) {
		parent::__construct($code);
		$this->paths = $paths;
	}

	public function getPaths() {
		return $this->paths->get('paths');
	}

	public function getPath($name) {
		return $this->paths->get('paths', $name);
	}

	public function getDefault() {
		return $this->getPath('default');
	}

	public function getDefaultPush() {
		$default = $this->getPath('default-push');
		return $default ? $default : $this->getPath('default');
	}
}
