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
 * Generated base class for `hg import`
 *
 * @generated
 * @see http://selenic.com/hg/help/import
 */
abstract class libhg_Command_Import_Base extends libhg_Command_Base {
	/**
	 * optional 'patches' arguments
	 *
	 * @var array
	 */
	protected $patches = array();

	/**
	 * optional 'strip' option (-p)
	 *
	 * @var string
	 */
	protected $strip = null;

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
	 * optional 'similarity' option (-s)
	 *
	 * @var string
	 */
	protected $similarity = null;

	/**
	 * 'edit' flag (-e)
	 *
	 * @var boolean
	 */
	protected $edit = false;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'noCommit' flag (--no-commit)
	 *
	 * @var boolean
	 */
	protected $noCommit = false;

	/**
	 * 'bypass' flag (--bypass)
	 *
	 * @var boolean
	 */
	protected $bypass = false;

	/**
	 * 'exact' flag (--exact)
	 *
	 * @var boolean
	 */
	protected $exact = false;

	/**
	 * 'importBranch' flag (--import-branch)
	 *
	 * @var boolean
	 */
	protected $importBranch = false;

	/**
	 * get patches
	 *
	 * @return array  set patches or array() if not set
	 */
	public function getPatches() {
		return $this->patches;
	}

	/**
	 * get strip
	 *
	 * @return string  set value or null if not set
	 */
	public function getStrip() {
		return $this->strip;
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
	 * get similarity
	 *
	 * @return string  set value or null if not set
	 */
	public function getSimilarity() {
		return $this->similarity;
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
	 * get force
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getForce() {
		return $this->force;
	}

	/**
	 * get noCommit
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoCommit() {
		return $this->noCommit;
	}

	/**
	 * get bypass
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getBypass() {
		return $this->bypass;
	}

	/**
	 * get exact
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getExact() {
		return $this->exact;
	}

	/**
	 * get importBranch
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getImportBranch() {
		return $this->importBranch;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'import'
	 */
	public function getCommandName() {
		return 'import';
	}

	/**
	 * append multiple patches
	 *
	 * @param  array $patches
	 * @return libhg_Command_Import_Base  self
	 */
	public function patches(array $patches) {
		foreach ($patches as $val) {
			$this->patches[] = $val;
		}

		return $this;
	}

	/**
	 * append a single patch
	 *
	 * @param  array $patch
	 * @return libhg_Command_Import_Base  self
	 */
	public function patch($patch) {
		$this->patches[] = $patch;
		return $this;
	}

	/**
	 * reset patches
	 *
	 * @return libhg_Command_Import_Base  self
	 */
	public function resetPatches() {
		$this->patches = array();
		return $this;
	}

	/**
	 * set strip
	 *
	 * @param  string $strip
	 * @return libhg_Command_Import_Base  self
	 */
	public function strip($strip) {
		$this->strip = $strip;
		return $this;
	}

	/**
	 * set message
	 *
	 * @param  string $message
	 * @return libhg_Command_Import_Base  self
	 */
	public function message($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * set logfile
	 *
	 * @param  string $logfile
	 * @return libhg_Command_Import_Base  self
	 */
	public function logfile($logfile) {
		$this->logfile = $logfile;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date
	 * @return libhg_Command_Import_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set user
	 *
	 * @param  string $user
	 * @return libhg_Command_Import_Base  self
	 */
	public function user($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * set similarity
	 *
	 * @param  string $similarity
	 * @return libhg_Command_Import_Base  self
	 */
	public function similarity($similarity) {
		$this->similarity = $similarity;
		return $this;
	}

	/**
	 * set edit
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Import_Base  self
	 */
	public function edit($flag = true) {
		$this->edit = (boolean) $flag;
		return $this;
	}

	/**
	 * set force
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Import_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set noCommit
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Import_Base  self
	 */
	public function noCommit($flag = true) {
		$this->noCommit = (boolean) $flag;
		return $this;
	}

	/**
	 * set bypass
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Import_Base  self
	 */
	public function bypass($flag = true) {
		$this->bypass = (boolean) $flag;
		return $this;
	}

	/**
	 * set exact
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Import_Base  self
	 */
	public function exact($flag = true) {
		$this->exact = (boolean) $flag;
		return $this;
	}

	/**
	 * set importBranch
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Import_Base  self
	 */
	public function importBranch($flag = true) {
		$this->importBranch = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->patches)) {
			foreach ($this->patches as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->strip !== null) $options->setSingle('-p', $this->strip);
		if ($this->message !== null) $options->setSingle('-m', $this->message);
		if ($this->logfile !== null) $options->setSingle('-l', $this->logfile);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->user !== null) $options->setSingle('-u', $this->user);
		if ($this->similarity !== null) $options->setSingle('-s', $this->similarity);
		if ($this->edit) $options->setFlag('-e');
		if ($this->force) $options->setFlag('-f');
		if ($this->noCommit) $options->setFlag('--no-commit');
		if ($this->bypass) $options->setFlag('--bypass');
		if ($this->exact) $options->setFlag('--exact');
		if ($this->importBranch) $options->setFlag('--import-branch');

		return $options;
	}
}
