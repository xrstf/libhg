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
 * Generated base class for `hg resolve`
 *
 * @generated
 * @see http://selenic.com/hg/help/resolve
 */
abstract class libhg_Command_Resolve_Base extends libhg_Command_Base {
	/**
	 * optional 'files' arguments
	 *
	 * @var array
	 */
	protected $files = array();

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
	 * optional 'tool' option (-t)
	 *
	 * @var string
	 */
	protected $tool = null;

	/**
	 * 'all' flag (-a)
	 *
	 * @var boolean
	 */
	protected $all = false;

	/**
	 * 'list' flag (-l)
	 *
	 * @var boolean
	 */
	protected $list = false;

	/**
	 * 'mark' flag (-m)
	 *
	 * @var boolean
	 */
	protected $mark = false;

	/**
	 * 'unmark' flag (-u)
	 *
	 * @var boolean
	 */
	protected $unmark = false;

	/**
	 * 'noStatus' flag (-n)
	 *
	 * @var boolean
	 */
	protected $noStatus = false;

	/**
	 * get files
	 *
	 * @return array  set files or array() if not set
	 */
	public function getFiles() {
		return $this->files;
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
	 * get tool
	 *
	 * @return string  set value or null if not set
	 */
	public function getTool() {
		return $this->tool;
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
	 * get list
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getList() {
		return $this->list;
	}

	/**
	 * get mark
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getMark() {
		return $this->mark;
	}

	/**
	 * get unmark
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUnmark() {
		return $this->unmark;
	}

	/**
	 * get noStatus
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoStatus() {
		return $this->noStatus;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'resolve'
	 */
	public function getCommandName() {
		return 'resolve';
	}

	/**
	 * append multiple files
	 *
	 * @param  array $files
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function files(array $files) {
		foreach ($files as $val) {
			$this->files[] = $val;
		}

		return $this;
	}

	/**
	 * append a single file
	 *
	 * @param  array $file
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function file($file) {
		$this->files[] = $file;
		return $this;
	}

	/**
	 * reset files
	 *
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Resolve_Base  self
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
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Resolve_Base  self
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
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set tool
	 *
	 * @param  string $tool
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function tool($tool) {
		$this->tool = $tool;
		return $this;
	}

	/**
	 * set all
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set list
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function list($flag = true) {
		$this->list = (boolean) $flag;
		return $this;
	}

	/**
	 * set mark
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function mark($flag = true) {
		$this->mark = (boolean) $flag;
		return $this;
	}

	/**
	 * set unmark
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function unmark($flag = true) {
		$this->unmark = (boolean) $flag;
		return $this;
	}

	/**
	 * set noStatus
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function noStatus($flag = true) {
		$this->noStatus = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->files)) {
			foreach ($this->files as $val) {
				$options->addArgument($val);
			}
		}
		if (!empty($this->include)) $options->setMultiple('-I', $this->include);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->tool !== null) $options->setSingle('-t', $this->tool);
		if ($this->all) $options->setFlag('-a');
		if ($this->list) $options->setFlag('-l');
		if ($this->mark) $options->setFlag('-m');
		if ($this->unmark) $options->setFlag('-u');
		if ($this->noStatus) $options->setFlag('-n');

		return $options;
	}
}
