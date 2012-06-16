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
 * Generated base class for `hg branch`
 *
 * @generated
 * @see http://selenic.com/hg/help/branch
 */
abstract class libhg_Command_Branch_Base extends libhg_Command_Base {
	/**
	 * optional 'name' argument
	 *
	 * @var string
	 */
	protected $name = false;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'clean' flag (-C)
	 *
	 * @var boolean
	 */
	protected $clean = false;

	/**
	 * get name
	 *
	 * @return string  set value or false if not set
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * get force
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getForce() {
		return $this->force;
	}

	/**
	 * get clean
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getClean() {
		return $this->clean;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'branch'
	 */
	public function getCommandName() {
		return 'branch';
	}

	/**
	 * set name
	 *
	 * @param  string $name               the single name argument
	 * @return libhg_Command_Branch_Base  self
	 */
	public function name($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Branch_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset clean flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Branch_Base  self
	 */
	public function clean($flag = true) {
		$this->clean = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->name !== null) $options->addArgument($this->name);
		if ($this->force) $options->setFlag('-f');
		if ($this->clean) $options->setFlag('-C');

		return $options;
	}
}
