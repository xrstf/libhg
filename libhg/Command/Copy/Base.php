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
 * Generated base class for `hg copy`
 *
 * @see       http://selenic.com/hg/help/copy
 * @generated 2012-06-04 02:01
 */
abstract class libhg_Command_Copy_Base extends libhg_Command_Base {
	/**
	 * optional 'sources' arguments
	 *
	 * @var array
	 */
	protected $sources = array();

	/**
	 * 'dest' argument
	 *
	 * @var string
	 */
	protected $dest = null;

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
	 * @return string  always 'copy'
	 */
	public function getCommandName() {
		return 'copy';
	}

	/**
	 * append multiple sources
	 *
	 * @param  array $sources
	 * @return libhg_Command_Copy_Base  self
	 */
	public function sources(array $sources) {
		foreach ($sources as $val) {
			$this->sources[] = $val;
		}

		return $this;
	}

	/**
	 * append a single source
	 *
	 * @param  array $source
	 * @return libhg_Command_Copy_Base  self
	 */
	public function source($source) {
		$this->sources[] = $source;
		return $this;
	}

	/**
	 * reset sources
	 *
	 * @return libhg_Command_Copy_Base  self
	 */
	public function resetSources() {
		$this->sources = array();
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest
	 * @return libhg_Command_Copy_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Copy_Base  self
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
	 * @return libhg_Command_Copy_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Copy_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Copy_Base  self
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
	 * @return libhg_Command_Copy_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Copy_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set after
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Copy_Base  self
	 */
	public function after($flag = true) {
		$this->after = (boolean) $flag;
		return $this;
	}

	/**
	 * set force
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Copy_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set dryRun
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Copy_Base  self
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
		if (!empty($this->include)) $options->setMultiple('-I', $this->include);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->after) $options->setFlag('-A');
		if ($this->force) $options->setFlag('-f');
		if ($this->dryRun) $options->setFlag('-n');

		return $options;
	}
}
