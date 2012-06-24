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
 * @see     http://selenic.com/hg/help/purge
 * @package libhg.Command.Purge
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
	protected $incl = array();

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
	 * 'printFiles' flag (-p)
	 *
	 * @var boolean
	 */
	protected $printFiles = false;

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
	 * get printFiles
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPrintFiles() {
		return $this->printFiles;
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
	 * append a single or multiple dirs
	 *
	 * @param  mixed $dirs               a single (scalar) or multiple (array) dirs
	 * @return libhg_Command_Purge_Base  self
	 */
	public function dir($dirs) {
		foreach ((array) $dirs as $val) {
			$this->dirs[] = $val;
		}

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
	 * append a single or multiple include
	 *
	 * @param  mixed $incl               a single (scalar) or multiple (array) include
	 * @return libhg_Command_Purge_Base  self
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
	 * @return libhg_Command_Purge_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude            a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Purge_Base  self
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
	 * @return libhg_Command_Purge_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set or unset abortOnError flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Purge_Base  self
	 */
	public function abortOnError($flag = true) {
		$this->abortOnError = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset all flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Purge_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset printFiles flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Purge_Base  self
	 */
	public function printFiles($flag = true) {
		$this->printFiles = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset print0 flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
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
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->abortOnError) $options->setFlag('-a');
		if ($this->all) $options->setFlag('--all');
		if ($this->printFiles) $options->setFlag('-p');
		if ($this->print0) $options->setFlag('-0');

		return $options;
	}
}
