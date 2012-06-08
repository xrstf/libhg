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
 * Generated base class for `hg revert`
 *
 * @generated
 * @see http://selenic.com/hg/help/revert
 */
abstract class libhg_Command_Revert_Base extends libhg_Command_Base {
	/**
	 * optional 'names' arguments
	 *
	 * @var array
	 */
	protected $names = array();

	/**
	 * optional 'include' options (-I)
	 *
	 * @var array
	 */
	protected $include = array();

	/**
	 * optional 'exclude' options (-X)
	 *
	 * @var array
	 */
	protected $exclude = array();

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * optional 'date' option (-d)
	 *
	 * @var string
	 */
	protected $date = null;

	/**
	 * 'all' flag (-a)
	 *
	 * @var boolean
	 */
	protected $all = false;

	/**
	 * 'noBackup' flag (-C)
	 *
	 * @var boolean
	 */
	protected $noBackup = false;

	/**
	 * 'dryRun' flag (-n)
	 *
	 * @var boolean
	 */
	protected $dryRun = false;

	/**
	 * get names
	 *
	 * @return array  set names or array() if not set
	 */
	public function getNames() {
		return $this->names;
	}

	/**
	 * get include
	 *
	 * @return array  set include or array() if not set
	 */
	public function getInclude() {
		return $this->include;
	}

	/**
	 * get exclude
	 *
	 * @return array  set exclude or array() if not set
	 */
	public function getExclude() {
		return $this->exclude;
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
	 * get date
	 *
	 * @return string  set value or null if not set
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * get all
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAll() {
		return $this->all;
	}

	/**
	 * get noBackup
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoBackup() {
		return $this->noBackup;
	}

	/**
	 * get dryRun
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDryRun() {
		return $this->dryRun;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'revert'
	 */
	public function getCommandName() {
		return 'revert';
	}

	/**
	 * append multiple names
	 *
	 * @param  array $names
	 * @return libhg_Command_Revert_Base  self
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
	 * @return libhg_Command_Revert_Base  self
	 */
	public function name($name) {
		$this->names[] = $name;
		return $this;
	}

	/**
	 * reset names
	 *
	 * @return libhg_Command_Revert_Base  self
	 */
	public function resetNames() {
		$this->names = array();
		return $this;
	}

	/**
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Revert_Base  self
	 */
	public function include(array $include) {
		foreach ($include as $val) {
			$this->include[] = $val;
		}

		return $this;
	}

	/**
	 * append a single incl
	 *
	 * @param  array $incl
	 * @return libhg_Command_Revert_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Revert_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Revert_Base  self
	 */
	public function exclude(array $exclude) {
		foreach ($exclude as $val) {
			$this->exclude[] = $val;
		}

		return $this;
	}

	/**
	 * append a single excl
	 *
	 * @param  array $excl
	 * @return libhg_Command_Revert_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Revert_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev
	 * @return libhg_Command_Revert_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date
	 * @return libhg_Command_Revert_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set all
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Revert_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set noBackup
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Revert_Base  self
	 */
	public function noBackup($flag = true) {
		$this->noBackup = (boolean) $flag;
		return $this;
	}

	/**
	 * set dryRun
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Revert_Base  self
	 */
	public function dryRun($flag = true) {
		$this->dryRun = (boolean) $flag;
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
		if (!empty($this->include)) $options->setMultiple('-I', $this->include);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->all) $options->setFlag('-a');
		if ($this->noBackup) $options->setFlag('-C');
		if ($this->dryRun) $options->setFlag('-n');

		return $options;
	}
}
