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
	protected $incl = array();

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
	 * 'listState' flag (-l)
	 *
	 * @var boolean
	 */
	protected $listState = false;

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
		return $this->incl;
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
	 * get listState
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getListState() {
		return $this->listState;
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
	 * append a single or multiple files
	 *
	 * @param  mixed $files                a single (scalar) or multiple (array) files
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function file($files) {
		foreach ((array) $files as $val) {
			$this->files[] = $val;
		}

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
	 * append a single or multiple include
	 *
	 * @param  mixed $incl                 a single (scalar) or multiple (array) include
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function incl($incl) {
		foreach ((array) $incl as $val) {
			$this->incl[] = $val;
		}

		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude              a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function excl($exclude) {
		foreach ((array) $exclude as $val) {
			$this->exclude[] = $val;
		}

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
	 * @param  string $tool                the single tool argument
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function tool($tool) {
		$this->tool = $tool;
		return $this;
	}

	/**
	 * set or unset all flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset listState flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function listState($flag = true) {
		$this->listState = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset mark flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function mark($flag = true) {
		$this->mark = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset unmark flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Resolve_Base  self
	 */
	public function unmark($flag = true) {
		$this->unmark = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset noStatus flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
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
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->tool !== null) $options->setSingle('-t', $this->tool);
		if ($this->all) $options->setFlag('-a');
		if ($this->listState) $options->setFlag('-l');
		if ($this->mark) $options->setFlag('-m');
		if ($this->unmark) $options->setFlag('-u');
		if ($this->noStatus) $options->setFlag('-n');

		return $options;
	}
}
