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
 * Generated base class for `hg showconfig`
 *
 * @see       http://selenic.com/hg/help/showconfig
 * @generated 2012-06-04 03:28
 */
abstract class libhg_Command_Showconfig_Base extends libhg_Command_Base {
	/**
	 * optional 'names' arguments
	 *
	 * @var array
	 */
	protected $names = array();

	/**
	 * 'untrusted' flag (-u)
	 *
	 * @var boolean
	 */
	protected $untrusted = false;

	/**
	 * get names
	 *
	 * @return array  set names or array() if not set
	 */
	public function getNames() {
		return $this->names;
	}

	/**
	 * get untrusted
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUntrusted() {
		return $this->untrusted;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'showconfig'
	 */
	public function getCommandName() {
		return 'showconfig';
	}

	/**
	 * append multiple names
	 *
	 * @param  array $names
	 * @return libhg_Command_Showconfig_Base  self
	 */
	public function names(array $names) {
		foreach ($names as $val) {
			$this->names[] = $val;
		}

		return $this;
	}

	/**
	 * append a single name
	 *
	 * @param  array $name
	 * @return libhg_Command_Showconfig_Base  self
	 */
	public function name($name) {
		$this->names[] = $name;
		return $this;
	}

	/**
	 * reset names
	 *
	 * @return libhg_Command_Showconfig_Base  self
	 */
	public function resetNames() {
		$this->names = array();
		return $this;
	}

	/**
	 * set untrusted
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Showconfig_Base  self
	 */
	public function untrusted($flag = true) {
		$this->untrusted = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->names)) {
			foreach ($this->names as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->untrusted) $options->setFlag('-u');

		return $options;
	}
}
