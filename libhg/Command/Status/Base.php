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
 * Generated base class for `hg status`
 *
 * @generated
 * @see http://selenic.com/hg/help/status
 */
abstract class libhg_Command_Status_Base extends libhg_Command_Base {
	/**
	 * optional 'files' arguments
	 *
	 * @var array
	 */
	protected $files = array();

	/**
	 * optional 'revs' options (--rev)
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
	 * optional 'change' option (--change)
	 *
	 * @var string
	 */
	protected $change = null;

	/**
	 * 'all' flag (-A)
	 *
	 * @var boolean
	 */
	protected $all = false;

	/**
	 * 'modified' flag (-m)
	 *
	 * @var boolean
	 */
	protected $modified = true;

	/**
	 * 'added' flag (-a)
	 *
	 * @var boolean
	 */
	protected $added = true;

	/**
	 * 'removed' flag (-r)
	 *
	 * @var boolean
	 */
	protected $removed = true;

	/**
	 * 'deleted' flag (-d)
	 *
	 * @var boolean
	 */
	protected $deleted = true;

	/**
	 * 'clean' flag (-c)
	 *
	 * @var boolean
	 */
	protected $clean = false;

	/**
	 * 'unknown' flag (-u)
	 *
	 * @var boolean
	 */
	protected $unknown = true;

	/**
	 * 'ignored' flag (-i)
	 *
	 * @var boolean
	 */
	protected $ignored = false;

	/**
	 * 'copies' flag (-C)
	 *
	 * @var boolean
	 */
	protected $copies = false;

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
	 * get all
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAll() {
		return $this->all;
	}

	/**
	 * get modified
	 *
	 * @return boolean  set value or true if not set
	 */
	public function getModified() {
		return $this->modified;
	}

	/**
	 * get added
	 *
	 * @return boolean  set value or true if not set
	 */
	public function getAdded() {
		return $this->added;
	}

	/**
	 * get removed
	 *
	 * @return boolean  set value or true if not set
	 */
	public function getRemoved() {
		return $this->removed;
	}

	/**
	 * get deleted
	 *
	 * @return boolean  set value or true if not set
	 */
	public function getDeleted() {
		return $this->deleted;
	}

	/**
	 * get clean
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getClean() {
		return $this->clean;
	}

	/**
	 * get unknown
	 *
	 * @return boolean  set value or true if not set
	 */
	public function getUnknown() {
		return $this->unknown;
	}

	/**
	 * get ignored
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnored() {
		return $this->ignored;
	}

	/**
	 * get copies
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCopies() {
		return $this->copies;
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
	 * @return string  always 'status'
	 */
	public function getCommandName() {
		return 'status';
	}

	/**
	 * append a single or multiple files
	 *
	 * @param  mixed $files               a single (scalar) or multiple (array) files
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs                a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl                a single (scalar) or multiple (array) include
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude             a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set change
	 *
	 * @param  string $change             the single change argument
	 * @return libhg_Command_Status_Base  self
	 */
	public function change($change) {
		$this->change = $change;
		return $this;
	}

	/**
	 * set or unset all flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset modified flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function modified($flag = true) {
		$this->modified = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset added flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function added($flag = true) {
		$this->added = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset removed flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function removed($flag = true) {
		$this->removed = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset deleted flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function deleted($flag = true) {
		$this->deleted = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset clean flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function clean($flag = true) {
		$this->clean = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset unknown flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function unknown($flag = true) {
		$this->unknown = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignored flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function ignored($flag = true) {
		$this->ignored = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset copies flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
	 */
	public function copies($flag = true) {
		$this->copies = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset subrepos flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Status_Base  self
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
		if (!empty($this->revs)) $options->setMultiple('--rev', $this->revs);
		if (!empty($this->include)) $options->setMultiple('-I', $this->include);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->change !== null) $options->setSingle('--change', $this->change);
		if ($this->all) $options->setFlag('-A');
		if ($this->modified) $options->setFlag('-m');
		if ($this->added) $options->setFlag('-a');
		if ($this->removed) $options->setFlag('-r');
		if ($this->deleted) $options->setFlag('-d');
		if ($this->clean) $options->setFlag('-c');
		if ($this->unknown) $options->setFlag('-u');
		if ($this->ignored) $options->setFlag('-i');
		if ($this->copies) $options->setFlag('-C');
		if ($this->subrepos) $options->setFlag('-S');

		return $options;
	}
}
