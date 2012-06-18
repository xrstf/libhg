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
 * @generated
 * @see http://selenic.com/hg/help/diff
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
	protected $incl = array();

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
	 * append a single or multiple files
	 *
	 * @param  mixed $files             a single (scalar) or multiple (array) files
	 * @return libhg_Command_Diff_Base  self
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
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs              a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Diff_Base  self
	 */
	public function rev($revs) {
		foreach ((array) $revs as $val) {
			$this->revs[] = $val;
		}

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
	 * append a single or multiple include
	 *
	 * @param  mixed $incl              a single (scalar) or multiple (array) include
	 * @return libhg_Command_Diff_Base  self
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
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude           a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Diff_Base  self
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
	 * @return libhg_Command_Diff_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set change
	 *
	 * @param  string $change           the single change argument
	 * @return libhg_Command_Diff_Base  self
	 */
	public function change($change) {
		$this->change = $change;
		return $this;
	}

	/**
	 * set unified
	 *
	 * @param  string $unified          the single unified argument
	 * @return libhg_Command_Diff_Base  self
	 */
	public function unified($unified) {
		$this->unified = $unified;
		return $this;
	}

	/**
	 * set or unset text flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function text($flag = true) {
		$this->text = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset git flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function git($flag = true) {
		$this->git = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset noDates flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function noDates($flag = true) {
		$this->noDates = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset showFunction flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function showFunction($flag = true) {
		$this->showFunction = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset reverse flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function reverse($flag = true) {
		$this->reverse = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreAllSpace flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function ignoreAllSpace($flag = true) {
		$this->ignoreAllSpace = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreSpaceChange flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function ignoreSpaceChange($flag = true) {
		$this->ignoreSpaceChange = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreBlankLines flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function ignoreBlankLines($flag = true) {
		$this->ignoreBlankLines = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset stat flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Diff_Base  self
	 */
	public function stat($flag = true) {
		$this->stat = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset subrepos flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
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
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
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
