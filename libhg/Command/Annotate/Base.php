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
 * Generated base class for `hg annotate`
 *
 * @generated
 * @see http://selenic.com/hg/help/annotate
 */
abstract class libhg_Command_Annotate_Base extends libhg_Command_Base {
	/**
	 * 'files' arguments
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
	 * 'noFollow' flag (--no-follow)
	 *
	 * @var boolean
	 */
	protected $noFollow = false;

	/**
	 * 'text' flag (-a)
	 *
	 * @var boolean
	 */
	protected $text = false;

	/**
	 * 'user' flag (-u)
	 *
	 * @var boolean
	 */
	protected $user = false;

	/**
	 * 'file' flag (-f)
	 *
	 * @var boolean
	 */
	protected $file = false;

	/**
	 * 'date' flag (-d)
	 *
	 * @var boolean
	 */
	protected $date = false;

	/**
	 * 'dateShort' flag (-q)
	 *
	 * @var boolean
	 */
	protected $dateShort = false;

	/**
	 * 'number' flag (-n)
	 *
	 * @var boolean
	 */
	protected $number = false;

	/**
	 * 'changeset' flag (-c)
	 *
	 * @var boolean
	 */
	protected $changeset = false;

	/**
	 * 'lineNumber' flag (-l)
	 *
	 * @var boolean
	 */
	protected $lineNumber = false;

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
	 * get noFollow
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoFollow() {
		return $this->noFollow;
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
	 * get user
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * get file
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * get date
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * get dateShort
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDateShort() {
		return $this->dateShort;
	}

	/**
	 * get number
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * get changeset
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getChangeset() {
		return $this->changeset;
	}

	/**
	 * get lineNumber
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getLineNumber() {
		return $this->lineNumber;
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
	 * get command name
	 *
	 * @return string  always 'annotate'
	 */
	public function getCommandName() {
		return 'annotate';
	}

	/**
	 * append multiple files
	 *
	 * @param  array $files
	 * @return libhg_Command_Annotate_Base  self
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
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function file($file) {
		$this->files[] = $file;
		return $this;
	}

	/**
	 * reset files
	 *
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Annotate_Base  self
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
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append multiple include
	 *
	 * @param  array $include
	 * @return libhg_Command_Annotate_Base  self
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
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function incl($incl) {
		$this->include[] = $incl;
		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function resetInclude() {
		$this->include = array();
		return $this;
	}

	/**
	 * append multiple exclude
	 *
	 * @param  array $exclude
	 * @return libhg_Command_Annotate_Base  self
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
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function excl($excl) {
		$this->exclude[] = $excl;
		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set noFollow
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function noFollow($flag = true) {
		$this->noFollow = (boolean) $flag;
		return $this;
	}

	/**
	 * set text
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function text($flag = true) {
		$this->text = (boolean) $flag;
		return $this;
	}

	/**
	 * set user
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function user($flag = true) {
		$this->user = (boolean) $flag;
		return $this;
	}

	/**
	 * set file
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function file($flag = true) {
		$this->file = (boolean) $flag;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function date($flag = true) {
		$this->date = (boolean) $flag;
		return $this;
	}

	/**
	 * set dateShort
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function dateShort($flag = true) {
		$this->dateShort = (boolean) $flag;
		return $this;
	}

	/**
	 * set number
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function number($flag = true) {
		$this->number = (boolean) $flag;
		return $this;
	}

	/**
	 * set changeset
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function changeset($flag = true) {
		$this->changeset = (boolean) $flag;
		return $this;
	}

	/**
	 * set lineNumber
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function lineNumber($flag = true) {
		$this->lineNumber = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignoreAllSpace
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function ignoreAllSpace($flag = true) {
		$this->ignoreAllSpace = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignoreSpaceChange
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function ignoreSpaceChange($flag = true) {
		$this->ignoreSpaceChange = (boolean) $flag;
		return $this;
	}

	/**
	 * set ignoreBlankLines
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function ignoreBlankLines($flag = true) {
		$this->ignoreBlankLines = (boolean) $flag;
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
		if ($this->noFollow) $options->setFlag('--no-follow');
		if ($this->text) $options->setFlag('-a');
		if ($this->user) $options->setFlag('-u');
		if ($this->file) $options->setFlag('-f');
		if ($this->date) $options->setFlag('-d');
		if ($this->dateShort) $options->setFlag('-q');
		if ($this->number) $options->setFlag('-n');
		if ($this->changeset) $options->setFlag('-c');
		if ($this->lineNumber) $options->setFlag('-l');
		if ($this->ignoreAllSpace) $options->setFlag('-w');
		if ($this->ignoreSpaceChange) $options->setFlag('-b');
		if ($this->ignoreBlankLines) $options->setFlag('-B');

		return $options;
	}
}
