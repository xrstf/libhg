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
 * Generated base class for `hg rebase`
 *
 * @generated
 * @see http://selenic.com/hg/help/rebase
 */
abstract class libhg_Command_Rebase_Base extends libhg_Command_Base {
	/**
	 * optional 'revs' options (-r)
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * optional 'source' option (-s)
	 *
	 * @var string
	 */
	protected $source = null;

	/**
	 * optional 'base' option (-b)
	 *
	 * @var string
	 */
	protected $base = null;

	/**
	 * optional 'dest' option (-d)
	 *
	 * @var string
	 */
	protected $dest = null;

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
	 * optional 'tool' option (-t)
	 *
	 * @var string
	 */
	protected $tool = null;

	/**
	 * 'collapse' flag (--collapse)
	 *
	 * @var boolean
	 */
	protected $collapse = false;

	/**
	 * 'edit' flag (-e)
	 *
	 * @var boolean
	 */
	protected $edit = false;

	/**
	 * 'keep' flag (--keep)
	 *
	 * @var boolean
	 */
	protected $keep = false;

	/**
	 * 'keepBranches' flag (--keepbranches)
	 *
	 * @var boolean
	 */
	protected $keepBranches = false;

	/**
	 * 'detach' flag (-D)
	 *
	 * @var boolean
	 */
	protected $detach = false;

	/**
	 * 'continue' flag (-c)
	 *
	 * @var boolean
	 */
	protected $continue = false;

	/**
	 * 'abort' flag (-a)
	 *
	 * @var boolean
	 */
	protected $abort = false;

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
	}

	/**
	 * get source
	 *
	 * @return string  set value or null if not set
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * get base
	 *
	 * @return string  set value or null if not set
	 */
	public function getBase() {
		return $this->base;
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
	 * get tool
	 *
	 * @return string  set value or null if not set
	 */
	public function getTool() {
		return $this->tool;
	}

	/**
	 * get collapse
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCollapse() {
		return $this->collapse;
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
	 * get keep
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getKeep() {
		return $this->keep;
	}

	/**
	 * get keepBranches
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getKeepBranches() {
		return $this->keepBranches;
	}

	/**
	 * get detach
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDetach() {
		return $this->detach;
	}

	/**
	 * get continue
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getContinue() {
		return $this->continue;
	}

	/**
	 * get abort
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAbort() {
		return $this->abort;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'rebase'
	 */
	public function getCommandName() {
		return 'rebase';
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Rebase_Base  self
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
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set source
	 *
	 * @param  string $source
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * set base
	 *
	 * @param  string $base
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function base($base) {
		$this->base = $base;
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * set message
	 *
	 * @param  string $message
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function message($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * set logfile
	 *
	 * @param  string $logfile
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function logfile($logfile) {
		$this->logfile = $logfile;
		return $this;
	}

	/**
	 * set tool
	 *
	 * @param  string $tool
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function tool($tool) {
		$this->tool = $tool;
		return $this;
	}

	/**
	 * set collapse
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function collapse($flag = true) {
		$this->collapse = (boolean) $flag;
		return $this;
	}

	/**
	 * set edit
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function edit($flag = true) {
		$this->edit = (boolean) $flag;
		return $this;
	}

	/**
	 * set keep
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function keep($flag = true) {
		$this->keep = (boolean) $flag;
		return $this;
	}

	/**
	 * set keepBranches
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function keepBranches($flag = true) {
		$this->keepBranches = (boolean) $flag;
		return $this;
	}

	/**
	 * set detach
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function detach($flag = true) {
		$this->detach = (boolean) $flag;
		return $this;
	}

	/**
	 * set continue
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function continue($flag = true) {
		$this->continue = (boolean) $flag;
		return $this;
	}

	/**
	 * set abort
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Rebase_Base  self
	 */
	public function abort($flag = true) {
		$this->abort = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if ($this->source !== null) $options->setSingle('-s', $this->source);
		if ($this->base !== null) $options->setSingle('-b', $this->base);
		if ($this->dest !== null) $options->setSingle('-d', $this->dest);
		if ($this->message !== null) $options->setSingle('-m', $this->message);
		if ($this->logfile !== null) $options->setSingle('-l', $this->logfile);
		if ($this->tool !== null) $options->setSingle('-t', $this->tool);
		if ($this->collapse) $options->setFlag('--collapse');
		if ($this->edit) $options->setFlag('-e');
		if ($this->keep) $options->setFlag('--keep');
		if ($this->keepBranches) $options->setFlag('--keepbranches');
		if ($this->detach) $options->setFlag('-D');
		if ($this->continue) $options->setFlag('-c');
		if ($this->abort) $options->setFlag('-a');

		return $options;
	}
}
