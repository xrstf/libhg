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
 * Generated base class for `hg purge`
 *
 * @generated
 * @see http://selenic.com/hg/help/purge
 */
abstract class libhg_Command_Purge_Base extends libhg_Command_Base {
	/**
	 * optional 'dirs' arguments
	 *
	 * @var array
	 */
	protected $dirs = array();

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
	 * 'abortOnError' flag (-a)
	 *
	 * @var boolean
	 */
	protected $abortOnError = false;

	/**
	 * 'all' flag (--all)
	 *
	 * @var boolean
	 */
	protected $all = false;

	/**
	 * 'print' flag (-p)
	 *
	 * @var boolean
	 */
	protected $print = false;

	/**
	 * 'print0' flag (-0)
	 *
	 * @var boolean
	 */
	protected $print0 = false;

	/**
	 * get dirs
	 *
	 * @return array  set dirs or array() if not set
	 */
	public function getDirs() {
		return $this->dirs;
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
	 * get abortOnError
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAbortOnError() {
		return $this->abortOnError;
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
	 * get print
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPrint() {
		return $this->print;
	}

	/**
	 * get print0
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPrint0() {
		return $this->print0;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'purge'
	 */
	public function getCommandName() {
		return 'purge';
	}

	/**
	 * append multiple dirs
	 *
	 * @param  array $dirs
	 * @return libhg_Command_Purge_Base  self
	 */
	public function dirs(array $dirs) {
		foreach ($dirs as $val) {
			$this->dirs[] = $val;
		}

		return $this;
	}

	/**
	 * append a single dir
	 *
	 * @param  array $dir
	 * @return libhg_Command_Purge_Base  self
	 */
	public function dir($dir) {
		$this->dirs[] = $dir;
		return $this;
	}

	/**
	 * reset dirs
	 *
	 * @return libhg_Command_Purge_Base  self
	 */
	public function resetDirs() {
		$this->dirs = array();
		return $this;
	}

	/**
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Purge_Base  self
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
	 * @return libhg_Command_Purge_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Purge_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Purge_Base  self
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
	 * @return libhg_Command_Purge_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Purge_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set abortOnError
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Purge_Base  self
	 */
	public function abortOnError($flag = true) {
		$this->abortOnError = (boolean) $flag;
		return $this;
	}

	/**
	 * set all
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Purge_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set print
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Purge_Base  self
	 */
	public function print($flag = true) {
		$this->print = (boolean) $flag;
		return $this;
	}

	/**
	 * set print0
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Purge_Base  self
	 */
	public function print0($flag = true) {
		$this->print0 = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->dirs)) {
			foreach ($this->dirs as $val) {
				$options->addArgument($val);
			}
		}
		if (!empty($this->include)) $options->setMultiple('-I', $this->include);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->abortOnError) $options->setFlag('-a');
		if ($this->all) $options->setFlag('--all');
		if ($this->print) $options->setFlag('-p');
		if ($this->print0) $options->setFlag('-0');

		return $options;
	}
}