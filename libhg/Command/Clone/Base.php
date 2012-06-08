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
 * Generated base class for `hg clone`
 *
 * @generated
 * @see http://selenic.com/hg/help/clone
 */
abstract class libhg_Command_Clone_Base extends libhg_Command_Base {
	/**
	 * 'source' argument
	 *
	 * @var string
	 */
	protected $source = null;

	/**
	 * optional 'dest' argument
	 *
	 * @var string
	 */
	protected $dest = null;

	/**
	 * optional 'revs' options (-r)
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * optional 'branches' options (-b)
	 *
	 * @var array
	 */
	protected $branches = array();

	/**
	 * optional 'updateRev' option (-u)
	 *
	 * @var string
	 */
	protected $updateRev = null;

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
	 * 'noUpdate' flag (-U)
	 *
	 * @var boolean
	 */
	protected $noUpdate = false;

	/**
	 * 'pull' flag (--pull)
	 *
	 * @var boolean
	 */
	protected $pull = false;

	/**
	 * 'uncompressed' flag (--uncompressed)
	 *
	 * @var boolean
	 */
	protected $uncompressed = false;

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
	 * get dest
	 *
	 * @return string  set value or null if not set
	 */
	public function getDest() {
		return $this->dest;
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
	 * get branches
	 *
	 * @return array  set branches or array() if not set
	 */
	public function getBranches() {
		return $this->branches;
	}

	/**
	 * get updateRev
	 *
	 * @return string  set value or null if not set
	 */
	public function getUpdateRev() {
		return $this->updateRev;
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
	 * get noUpdate
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoUpdate() {
		return $this->noUpdate;
	}

	/**
	 * get pull
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPull() {
		return $this->pull;
	}

	/**
	 * get uncompressed
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUncompressed() {
		return $this->uncompressed;
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
	 * @return string  always 'clone'
	 */
	public function getCommandName() {
		return 'clone';
	}

	/**
	 * set source
	 *
	 * @param  string $source
	 * @return libhg_Command_Clone_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest
	 * @return libhg_Command_Clone_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Clone_Base  self
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
	 * @return libhg_Command_Clone_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Clone_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append multiple branches
	 *
	 * @param  array $branches
	 * @return libhg_Command_Clone_Base  self
	 */
	public function branches(array $branches) {
		foreach ($branches as $val) {
			$this->branches[] = $val;
		}

		return $this;
	}

	/**
	 * append a single branch
	 *
	 * @param  array $branch
	 * @return libhg_Command_Clone_Base  self
	 */
	public function branch($branch) {
		$this->branches[] = $branch;
		return $this;
	}

	/**
	 * reset branches
	 *
	 * @return libhg_Command_Clone_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * set updateRev
	 *
	 * @param  string $updateRev
	 * @return libhg_Command_Clone_Base  self
	 */
	public function updateRev($updateRev) {
		$this->updateRev = $updateRev;
		return $this;
	}

	/**
	 * set ssh
	 *
	 * @param  string $ssh
	 * @return libhg_Command_Clone_Base  self
	 */
	public function ssh($ssh) {
		$this->ssh = $ssh;
		return $this;
	}

	/**
	 * set remoteCmd
	 *
	 * @param  string $remoteCmd
	 * @return libhg_Command_Clone_Base  self
	 */
	public function remoteCmd($remoteCmd) {
		$this->remoteCmd = $remoteCmd;
		return $this;
	}

	/**
	 * set noUpdate
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Clone_Base  self
	 */
	public function noUpdate($flag = true) {
		$this->noUpdate = (boolean) $flag;
		return $this;
	}

	/**
	 * set pull
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Clone_Base  self
	 */
	public function pull($flag = true) {
		$this->pull = (boolean) $flag;
		return $this;
	}

	/**
	 * set uncompressed
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Clone_Base  self
	 */
	public function uncompressed($flag = true) {
		$this->uncompressed = (boolean) $flag;
		return $this;
	}

	/**
	 * set insecure
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Clone_Base  self
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
		if ($this->dest !== null) $options->addArgument($this->dest);
		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if (!empty($this->branches)) $options->setMultiple('-b', $this->branches);
		if ($this->updateRev !== null) $options->setSingle('-u', $this->updateRev);
		if ($this->ssh !== null) $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->noUpdate) $options->setFlag('-U');
		if ($this->pull) $options->setFlag('--pull');
		if ($this->uncompressed) $options->setFlag('--uncompressed');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
