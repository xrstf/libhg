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
 * Generated base class for `hg commit`
 *
 * @generated
 * @see     http://selenic.com/hg/help/commit
 * @package libhg.Command.Commit
 */
abstract class libhg_Command_Commit_Base extends libhg_Command_Base {
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
	 * optional 'message' option (-m)
	 *
	 * @var string
	 */
	protected $message = null;

	/**
	 * optional 'logfile' option (-l)
	 *
	 * @var string
	 */
	protected $logfile = null;

	/**
	 * optional 'date' option (-d)
	 *
	 * @var string
	 */
	protected $date = null;

	/**
	 * optional 'user' option (-u)
	 *
	 * @var string
	 */
	protected $user = null;

	/**
	 * 'addremove' flag (-A)
	 *
	 * @var boolean
	 */
	protected $addremove = false;

	/**
	 * 'closeBranch' flag (--close-branch)
	 *
	 * @var boolean
	 */
	protected $closeBranch = false;

	/**
	 * 'amend' flag (--amend)
	 *
	 * @var boolean
	 */
	protected $amend = false;

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
	 * get message
	 *
	 * @return string  set value or null if not set
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * get logfile
	 *
	 * @return string  set value or null if not set
	 */
	public function getLogfile() {
		return $this->logfile;
	}

	/**
	 * get date
	 *
	 * @return string  set value or null if not set
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * get user
	 *
	 * @return string  set value or null if not set
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * get addremove
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAddremove() {
		return $this->addremove;
	}

	/**
	 * get closeBranch
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCloseBranch() {
		return $this->closeBranch;
	}

	/**
	 * get amend
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAmend() {
		return $this->amend;
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
	 * @return string  always 'commit'
	 */
	public function getCommandName() {
		return 'commit';
	}

	/**
	 * append a single or multiple files
	 *
	 * @param  mixed $files               a single (scalar) or multiple (array) files
	 * @return libhg_Command_Commit_Base  self
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
	 * @return libhg_Command_Commit_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl                a single (scalar) or multiple (array) include
	 * @return libhg_Command_Commit_Base  self
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
	 * @return libhg_Command_Commit_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude             a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Commit_Base  self
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
	 * @return libhg_Command_Commit_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set message
	 *
	 * @param  string $message            the single message argument
	 * @return libhg_Command_Commit_Base  self
	 */
	public function message($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * set logfile
	 *
	 * @param  string $logfile            the single logfile argument
	 * @return libhg_Command_Commit_Base  self
	 */
	public function logfile($logfile) {
		$this->logfile = $logfile;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date               the single date argument
	 * @return libhg_Command_Commit_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set user
	 *
	 * @param  string $user               the single user argument
	 * @return libhg_Command_Commit_Base  self
	 */
	public function user($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * set or unset addremove flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Commit_Base  self
	 */
	public function addremove($flag = true) {
		$this->addremove = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset closeBranch flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Commit_Base  self
	 */
	public function closeBranch($flag = true) {
		$this->closeBranch = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset amend flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Commit_Base  self
	 */
	public function amend($flag = true) {
		$this->amend = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset subrepos flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Commit_Base  self
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
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->message !== null) $options->setSingle('-m', $this->message);
		if ($this->logfile !== null) $options->setSingle('-l', $this->logfile);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->user !== null) $options->setSingle('-u', $this->user);
		if ($this->addremove) $options->setFlag('-A');
		if ($this->closeBranch) $options->setFlag('--close-branch');
		if ($this->amend) $options->setFlag('--amend');
		if ($this->subrepos) $options->setFlag('-S');

		return $options;
	}
}
