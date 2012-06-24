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
 * Generated base class for `hg rename`
 *
 * @generated
 * @see     http://selenic.com/hg/help/rename
 * @package libhg.Command.Rename
 */
abstract class libhg_Command_Rename_Base extends libhg_Command_Base {
	/**
	 * 'sources' arguments
	 *
	 * @var array
	 */
	protected $sources = array();

	/**
	 * optional 'dest' argument
	 *
	 * @var string
	 */
	protected $dest = null;

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
	 * 'after' flag (-A)
	 *
	 * @var boolean
	 */
	protected $after = false;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'dryRun' flag (-n)
	 *
	 * @var boolean
	 */
	protected $dryRun = false;

	/**
	 * get sources
	 *
	 * @return array  set sources or array() if not set
	 */
	public function getSources() {
		return $this->sources;
	}

	/**
	 * get dest
	 *
	 * @return string  set value or null if not set
	 */
	public function getDest() {
		return $this->dest;
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
	 * get after
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAfter() {
		return $this->after;
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
	 * @return string  always 'rename'
	 */
	public function getCommandName() {
		return 'rename';
	}

	/**
	 * append a single or multiple sources
	 *
	 * @param  mixed $sources             a single (scalar) or multiple (array) sources
	 * @return libhg_Command_Rename_Base  self
	 */
	public function source($sources) {
		foreach ((array) $sources as $val) {
			$this->sources[] = $val;
		}

		return $this;
	}

	/**
	 * reset sources
	 *
	 * @return libhg_Command_Rename_Base  self
	 */
	public function resetSources() {
		$this->sources = array();
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest               the single dest argument
	 * @return libhg_Command_Rename_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl                a single (scalar) or multiple (array) include
	 * @return libhg_Command_Rename_Base  self
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
	 * @return libhg_Command_Rename_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude             a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Rename_Base  self
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
	 * @return libhg_Command_Rename_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set or unset after flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Rename_Base  self
	 */
	public function after($flag = true) {
		$this->after = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Rename_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset dryRun flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Rename_Base  self
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

		if (!empty($this->sources)) {
			foreach ($this->sources as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->dest !== null) $options->addArgument($this->dest);
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->after) $options->setFlag('-A');
		if ($this->force) $options->setFlag('-f');
		if ($this->dryRun) $options->setFlag('-n');

		return $options;
	}
}
