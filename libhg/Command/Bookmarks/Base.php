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
 * Generated base class for `hg bookmarks`
 *
 * @generated
 * @see http://selenic.com/hg/help/bookmarks
 */
abstract class libhg_Command_Bookmarks_Base extends libhg_Command_Base {
	/**
	 * optional 'name' argument
	 *
	 * @var string
	 */
	protected $name = null;

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * optional 'rename' option (-m)
	 *
	 * @var string
	 */
	protected $rename = null;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'delete' flag (-d)
	 *
	 * @var boolean
	 */
	protected $delete = false;

	/**
	 * 'inactive' flag (-i)
	 *
	 * @var boolean
	 */
	protected $inactive = false;

	/**
	 * get name
	 *
	 * @return string  set value or null if not set
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * get rev
	 *
	 * @return string  set value or null if not set
	 */
	public function getRev() {
		return $this->rev;
	}

	/**
	 * get rename
	 *
	 * @return string  set value or null if not set
	 */
	public function getRename() {
		return $this->rename;
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
	 * get delete
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDelete() {
		return $this->delete;
	}

	/**
	 * get inactive
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getInactive() {
		return $this->inactive;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'bookmarks'
	 */
	public function getCommandName() {
		return 'bookmarks';
	}

	/**
	 * set name
	 *
	 * @param  string $name
	 * @return libhg_Command_Bookmarks_Base  self
	 */
	public function name($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev
	 * @return libhg_Command_Bookmarks_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set rename
	 *
	 * @param  string $rename
	 * @return libhg_Command_Bookmarks_Base  self
	 */
	public function rename($rename) {
		$this->rename = $rename;
		return $this;
	}

	/**
	 * set force
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Bookmarks_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set delete
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Bookmarks_Base  self
	 */
	public function delete($flag = true) {
		$this->delete = (boolean) $flag;
		return $this;
	}

	/**
	 * set inactive
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Bookmarks_Base  self
	 */
	public function inactive($flag = true) {
		$this->inactive = (boolean) $flag;
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
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->rename !== null) $options->setSingle('-m', $this->rename);
		if ($this->force) $options->setFlag('-f');
		if ($this->delete) $options->setFlag('-d');
		if ($this->inactive) $options->setFlag('-i');

		return $options;
	}
}
