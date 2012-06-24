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
 * Generated result class for `hg version`
 *
 * @generated
 * @see     http://selenic.com/hg/help/version
 * @package libhg.Command.Version
 */
class libhg_Command_Version_Result {
	/**
	 * full hg version
	 *
	 * @var string
	 */
	public $version;

	/**
	 * major version
	 *
	 * @var int
	 */
	public $major;

	/**
	 * minor version
	 *
	 * @var int
	 */
	public $minor;

	/**
	 * bugfix version
	 *
	 * @var int
	 */
	public $bugfix;

	/**
	 * extra version specifier (distribution specific)
	 *
	 * @var string
	 */
	public $extra;

	/**
	 * Constructor
	 *
	 * @param string $version  full hg version
	 */
	public function __construct($version) {
		$this->version = $version;

		$parts = explode('.', $version, 3);

		$this->major = (int) $parts[0];
		$this->minor = (int) $parts[1];

		$parts = preg_split('/[+-]/', $parts[2], 2);

		$this->bugfix = (int) $parts[0];
		$this->extra  = isset($parts[1]) ? $parts[1] : '';
	}

	/**
	 * get formatted version
	 *
	 * @param  string $format  format like 'X.Y.Z' for '1.9.1'
	 * @return string          format with replaced placeholders
	 */
	public function format($format) {
		return str_replace(array('X', 'Y', 'Z'), array($this->major, $this->minor, $this->bugfix), $format);
	}
}
