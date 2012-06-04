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
 * Generated base class for `hg diff`
 *
 * @see       http://selenic.com/hg/help/diff
 * @generated 2012-06-04 02:01
 */
abstract class libhg_Command_Diff_Base extends libhg_Command_Base {
	/**
	 * optional 'files' arguments
	 *
	 * @var array
	 */
	protected $files = array();

	/**
	 * optional 'revs' options (-r)
	 *
	 * @var array
	 */
	protected $revs = array();

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
	 * optional 'change' option (-c)
	 *
	 * @var string
	 */
	protected $change = null;

	/**
	 * optional 'unified' option (-U)
	 *
	 * @var string
	 */
	protected $unified = null;

	/**
	 * 'text' flag (-a)
	 *
	 * @var boolean
	 */
	protected $text = false;

	/**
	 * 'git' flag (-g)
	 *
	 * @var boolean
	 */
	protected $git = false;

	/**
	 * 'noDates' flag (--nodates)
	 *
	 * @var boolean
	 */
	protected $noDates = false;

	/**
	 * 'showFunction' flag (-p)
	 *
	 * @var boolean
	 */
	protected $showFunction = false;

	/**
	 * 'reverse' flag (--reverse)
	 *
	 * @var boolean
	 */
	protected $reverse = false;

	/**
	 * 'ignoreAllSpace' flag (-w)
	 *
	 * @var boolean
	 */
	protected $ignoreAllSpace = false;

	/**
	 * 'ignoreSpaceChange' flag (-b)
	 *
	 * @var boolean
	 */
	protected $ignoreSpaceChange = false;

	/**
	 * 'ignoreBlankLines' flag (-B)
	 *
	 * @var boolean
	 */
	protected $ignoreBlankLines = false;

	/**
	 * 'stat' flag (--stat)
	 *
	 * @var boolean
	 */
	protected $stat = false;

	/**
	 * 'subrepos' flag (-S)
	 *
	 * @var boolean
	 */
	protected $subrepos = false;

	/**
	 * get files
	 *
	 * @return array  set files or array() if not set
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
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
	 * get change
	 *
	 * @return string  set value or null if not set
	 */
	public function getChange() {
		return $this->change;
	}

	/**
	 * get unified
	 *
	 * @return string  set value or null if not set
	 */
	public function getUnified() {
		return $this->unified;
	}

	/**
	 * get text
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * get git
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getGit() {
		return $this->git;
	}

	/**
	 * get noDates
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoDates() {
		return $this->noDates;
	}

	/**
	 * get showFunction
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getShowFunction() {
		return $this->showFunction;
	}

	/**
	 * get reverse
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getReverse() {
		return $this->reverse;
	}

	/**
	 * get ignoreAllSpace
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreAllSpace() {
		return $this->ignoreAllSpace;
	}

	/**
	 * get ignoreSpaceChange
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreSpaceChange() {
		return $this->ignoreSpaceChange;
	}

	/**
	 * get ignoreBlankLines
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreBlankLines() {
		return $this->ignoreBlankLines;
	}

	/**
	 * get stat
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getStat() {
		return $this->stat;
	}

	/**
	 * get subrepos
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getSubrepos() {
		return $this->subrepos;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'diff'
	 */
	public function getCommandName() {
		return 'diff';
	}

	/**
	 * append multiple files
	 *
	 * @param  array $files
	 * @return libhg_Command_Diff_Base  self
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
	 * @return libhg_Command_Diff_Base  self
	 */
	public function file($file) {
		$this->files[] = $file;
		return $this;
	}

	/**
	 * reset files
	 *
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Diff_Base  self
	 */
	public function revs(array $revs) {
		foreach ($revs as $val) {
			$this->revs[] = $val;
		}

		return $this;
	}

	/**
	 * append a single rev
	 *
	 * @param  array $rev
	 * @return libhg_Command_Diff_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Diff_Base  self
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
	 * @return libhg_Command_Diff_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Diff_Base  self
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
	 * @return libhg_Command_Diff_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set change
	 *
	 * @param  string $change
	 * @return libhg_Command_Diff_Base  self
	 */
	public function change($change) {
		$this->change = $change;
		return $this;
	}

	/**
	 * set unified
	 *
	 * @param  string $unified
	 * @return libhg_Command_Diff_Base  self
	 */
	public function unified($unified) {
		$this->unified = $unified;
		return $this;
	}

	/**
	 * set text
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function text($flag = true) {
		$this->text = (boolean) $flag;
		return $this;
	}

	/**
	 * set git
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function git($flag = true) {
		$this->git = (boolean) $flag;
		return $this;
	}

	/**
	 * set noDates
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function noDates($flag = true) {
		$this->noDates = (boolean) $flag;
		return $this;
	}

	/**
	 * set showFunction
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function showFunction($flag = true) {
		$this->showFunction = (boolean) $flag;
		return $this;
	}

	/**
	 * set reverse
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function reverse($flag = true) {
		$this->reverse = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignoreAllSpace
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function ignoreAllSpace($flag = true) {
		$this->ignoreAllSpace = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignoreSpaceChange
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function ignoreSpaceChange($flag = true) {
		$this->ignoreSpaceChange = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignoreBlankLines
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function ignoreBlankLines($flag = true) {
		$this->ignoreBlankLines = (boolean) $flag;
		return $this;
	}

	/**
	 * set stat
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function stat($flag = true) {
		$this->stat = (boolean) $flag;
		return $this;
	}

	/**
	 * set subrepos
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Diff_Base  self
	 */
	public function subrepos($flag = true) {
		$this->subrepos = (boolean) $flag;
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
		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if (!empty($this->include)) $options->setMultiple('-I', $this->include);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->change !== null) $options->setSingle('-c', $this->change);
		if ($this->unified !== null) $options->setSingle('-U', $this->unified);
		if ($this->text) $options->setFlag('-a');
		if ($this->git) $options->setFlag('-g');
		if ($this->noDates) $options->setFlag('--nodates');
		if ($this->showFunction) $options->setFlag('-p');
		if ($this->reverse) $options->setFlag('--reverse');
		if ($this->ignoreAllSpace) $options->setFlag('-w');
		if ($this->ignoreSpaceChange) $options->setFlag('-b');
		if ($this->ignoreBlankLines) $options->setFlag('-B');
		if ($this->stat) $options->setFlag('--stat');
		if ($this->subrepos) $options->setFlag('-S');

		return $options;
	}
}