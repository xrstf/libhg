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
 * Generated base class for `hg pull`
 *
 * @generated
 * @see     http://selenic.com/hg/help/pull
 * @package libhg.Command.Pull
 */
abstract class libhg_Command_Pull_Base extends libhg_Command_Base {
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
	 * optional 'bookmarks' options (-B)
	 *
	 * @var array
	 */
	protected $bookmarks = array();

	/**
	 * optional 'branches' options (-b)
	 *
	 * @var array
	 */
	protected $branches = array();

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
	 * 'update' flag (-u)
	 *
	 * @var boolean
	 */
	protected $update = false;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'tool' flag (-t)
	 *
	 * @var boolean
	 */
	protected $tool = false;

	/**
	 * 'rebase' flag (--rebase)
	 *
	 * @var boolean
	 */
	protected $rebase = false;

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
	 * get bookmarks
	 *
	 * @return array  set bookmarks or array() if not set
	 */
	public function getBookmarks() {
		return $this->bookmarks;
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
	 * get update
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUpdate() {
		return $this->update;
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
	 * get tool
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getTool() {
		return $this->tool;
	}

	/**
	 * get rebase
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getRebase() {
		return $this->rebase;
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
	 * @return string  always 'pull'
	 */
	public function getCommandName() {
		return 'pull';
	}

	/**
	 * set source
	 *
	 * @param  string $source           the single source argument
	 * @return libhg_Command_Pull_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs              a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Pull_Base  self
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
	 * @return libhg_Command_Pull_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple bookmarks
	 *
	 * @param  mixed $bookmarks         a single (scalar) or multiple (array) bookmarks
	 * @return libhg_Command_Pull_Base  self
	 */
	public function bookmark($bookmarks) {
		foreach ((array) $bookmarks as $val) {
			$this->bookmarks[] = $val;
		}

		return $this;
	}

	/**
	 * reset bookmarks
	 *
	 * @return libhg_Command_Pull_Base  self
	 */
	public function resetBookmarks() {
		$this->bookmarks = array();
		return $this;
	}

	/**
	 * append a single or multiple branches
	 *
	 * @param  mixed $branches          a single (scalar) or multiple (array) branches
	 * @return libhg_Command_Pull_Base  self
	 */
	public function branch($branches) {
		foreach ((array) $branches as $val) {
			$this->branches[] = $val;
		}

		return $this;
	}

	/**
	 * reset branches
	 *
	 * @return libhg_Command_Pull_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * set ssh
	 *
	 * @param  string $ssh              the single ssh argument
	 * @return libhg_Command_Pull_Base  self
	 */
	public function ssh($ssh) {
		$this->ssh = $ssh;
		return $this;
	}

	/**
	 * set remoteCmd
	 *
	 * @param  string $remoteCmd        the single remoteCmd argument
	 * @return libhg_Command_Pull_Base  self
	 */
	public function remoteCmd($remoteCmd) {
		$this->remoteCmd = $remoteCmd;
		return $this;
	}

	/**
	 * set or unset update flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Pull_Base  self
	 */
	public function update($flag = true) {
		$this->update = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Pull_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset tool flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Pull_Base  self
	 */
	public function tool($flag = true) {
		$this->tool = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset rebase flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Pull_Base  self
	 */
	public function rebase($flag = true) {
		$this->rebase = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset insecure flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Pull_Base  self
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
		if (!empty($this->bookmarks)) $options->setMultiple('-B', $this->bookmarks);
		if (!empty($this->branches)) $options->setMultiple('-b', $this->branches);
		if ($this->ssh !== null) $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->update) $options->setFlag('-u');
		if ($this->force) $options->setFlag('-f');
		if ($this->tool) $options->setFlag('-t');
		if ($this->rebase) $options->setFlag('--rebase');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
