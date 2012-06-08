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
	protected $include = array();

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
	 * 'noStatus' flag (-n)
	 *
	 * @var boolean
	 */
	protected $noStatus = false;

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
	 * get noStatus
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoStatus() {
		return $this->noStatus;
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
	 * append multiple files
	 *
	 * @param  array $files
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function file($file) {
		$this->files[] = $file;
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
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
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
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Status_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Status_Base  self
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
	 * @return libhg_Command_Status_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
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
	 * @param  string $change
	 * @return libhg_Command_Status_Base  self
	 */
	public function change($change) {
		$this->change = $change;
		return $this;
	}

	/**
	 * set all
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set modified
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function modified($flag = true) {
		$this->modified = (boolean) $flag;
		return $this;
	}

	/**
	 * set added
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function added($flag = true) {
		$this->added = (boolean) $flag;
		return $this;
	}

	/**
	 * set removed
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function removed($flag = true) {
		$this->removed = (boolean) $flag;
		return $this;
	}

	/**
	 * set deleted
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function deleted($flag = true) {
		$this->deleted = (boolean) $flag;
		return $this;
	}

	/**
	 * set clean
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function clean($flag = true) {
		$this->clean = (boolean) $flag;
		return $this;
	}

	/**
	 * set unknown
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function unknown($flag = true) {
		$this->unknown = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignored
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function ignored($flag = true) {
		$this->ignored = (boolean) $flag;
		return $this;
	}

	/**
	 * set noStatus
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function noStatus($flag = true) {
		$this->noStatus = (boolean) $flag;
		return $this;
	}

	/**
	 * set copies
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Status_Base  self
	 */
	public function copies($flag = true) {
		$this->copies = (boolean) $flag;
		return $this;
	}

	/**
	 * set subrepos
	 *
	 * @param  boolean $flag
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
		if ($this->noStatus) $options->setFlag('-n');
		if ($this->copies) $options->setFlag('-C');
		if ($this->subrepos) $options->setFlag('-S');

		return $options;
	}
}
