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
 * Generated base class for `hg fetch`
 *
 * @generated
 * @see http://selenic.com/hg/help/fetch
 */
abstract class libhg_Command_Fetch_Base extends libhg_Command_Base {
	/**
	 * optional 'source' argument
	 *
	 * @var string
	 */
	protected $source = null;

	/**
	 * optional 'revs' options (-r)
	 *
	 * @var array
	 */
	protected $revs = array();

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
	 * optional 'ssh' option (-e)
	 *
	 * @var string
	 */
	protected $ssh = null;

	/**
	 * optional 'remoteCmd' option (--remotecmd)
	 *
	 * @var string
	 */
	protected $remoteCmd = null;

	/**
	 * 'edit' flag (-e)
	 *
	 * @var boolean
	 */
	protected $edit = false;

	/**
	 * 'switchParent' flag (--switch-parent)
	 *
	 * @var boolean
	 */
	protected $switchParent = false;

	/**
	 * 'insecure' flag (--insecure)
	 *
	 * @var boolean
	 */
	protected $insecure = false;

	/**
	 * get source
	 *
	 * @return string  set value or null if not set
	 */
	public function getSource() {
		return $this->source;
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
	 * get ssh
	 *
	 * @return string  set value or null if not set
	 */
	public function getSsh() {
		return $this->ssh;
	}

	/**
	 * get remoteCmd
	 *
	 * @return string  set value or null if not set
	 */
	public function getRemoteCmd() {
		return $this->remoteCmd;
	}

	/**
	 * get edit
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getEdit() {
		return $this->edit;
	}

	/**
	 * get switchParent
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getSwitchParent() {
		return $this->switchParent;
	}

	/**
	 * get insecure
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getInsecure() {
		return $this->insecure;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'fetch'
	 */
	public function getCommandName() {
		return 'fetch';
	}

	/**
	 * set source
	 *
	 * @param  string $source
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Fetch_Base  self
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
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set message
	 *
	 * @param  string $message
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function message($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * set logfile
	 *
	 * @param  string $logfile
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function logfile($logfile) {
		$this->logfile = $logfile;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set user
	 *
	 * @param  string $user
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function user($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * set ssh
	 *
	 * @param  string $ssh
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function ssh($ssh) {
		$this->ssh = $ssh;
		return $this;
	}

	/**
	 * set remoteCmd
	 *
	 * @param  string $remoteCmd
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function remoteCmd($remoteCmd) {
		$this->remoteCmd = $remoteCmd;
		return $this;
	}

	/**
	 * set edit
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function edit($flag = true) {
		$this->edit = (boolean) $flag;
		return $this;
	}

	/**
	 * set switchParent
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function switchParent($flag = true) {
		$this->switchParent = (boolean) $flag;
		return $this;
	}

	/**
	 * set insecure
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Fetch_Base  self
	 */
	public function insecure($flag = true) {
		$this->insecure = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->source !== null) $options->addArgument($this->source);
		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if ($this->message !== null) $options->setSingle('-m', $this->message);
		if ($this->logfile !== null) $options->setSingle('-l', $this->logfile);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->user !== null) $options->setSingle('-u', $this->user);
		if ($this->ssh !== null) $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->edit) $options->setFlag('-e');
		if ($this->switchParent) $options->setFlag('--switch-parent');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
