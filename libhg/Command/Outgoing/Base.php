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
 * Generated base class for `hg outgoing`
 *
 * @generated
 * @see http://selenic.com/hg/help/outgoing
 */
abstract class libhg_Command_Outgoing_Base extends libhg_Command_Base {
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
	 * optional 'limit' option (-l)
	 *
	 * @var string
	 */
	protected $limit = null;

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
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'newestFirst' flag (-n)
	 *
	 * @var boolean
	 */
	protected $newestFirst = false;

	/**
	 * 'bookmarks' flag (-B)
	 *
	 * @var boolean
	 */
	protected $bookmarks = false;

	/**
	 * 'noMerges' flag (-M)
	 *
	 * @var boolean
	 */
	protected $noMerges = false;

	/**
	 * 'insecure' flag (--insecure)
	 *
	 * @var boolean
	 */
	protected $insecure = false;

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
	 * get limit
	 *
	 * @return string  set value or null if not set
	 */
	public function getLimit() {
		return $this->limit;
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
	 * get force
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getForce() {
		return $this->force;
	}

	/**
	 * get newestFirst
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNewestFirst() {
		return $this->newestFirst;
	}

	/**
	 * get bookmarks
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getBookmarks() {
		return $this->bookmarks;
	}

	/**
	 * get noMerges
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoMerges() {
		return $this->noMerges;
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
	 * @return string  always 'outgoing'
	 */
	public function getCommandName() {
		return 'outgoing';
	}

	/**
	 * set dest
	 *
	 * @param  string $dest                 the single dest argument
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs                  a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Outgoing_Base  self
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
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple branches
	 *
	 * @param  mixed $branches              a single (scalar) or multiple (array) branches
	 * @return libhg_Command_Outgoing_Base  self
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
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * set limit
	 *
	 * @param  string $limit                the single limit argument
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function limit($limit) {
		$this->limit = $limit;
		return $this;
	}

	/**
	 * set ssh
	 *
	 * @param  string $ssh                  the single ssh argument
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function ssh($ssh) {
		$this->ssh = $ssh;
		return $this;
	}

	/**
	 * set remoteCmd
	 *
	 * @param  string $remoteCmd            the single remoteCmd argument
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function remoteCmd($remoteCmd) {
		$this->remoteCmd = $remoteCmd;
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset newestFirst flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function newestFirst($flag = true) {
		$this->newestFirst = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset bookmarks flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function bookmarks($flag = true) {
		$this->bookmarks = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset noMerges flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Outgoing_Base  self
	 */
	public function noMerges($flag = true) {
		$this->noMerges = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset insecure flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Outgoing_Base  self
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

		if ($this->dest !== null) $options->addArgument($this->dest);
		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if (!empty($this->branches)) $options->setMultiple('-b', $this->branches);
		if ($this->limit !== null) $options->setSingle('-l', $this->limit);
		if ($this->ssh !== null) $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->force) $options->setFlag('-f');
		if ($this->newestFirst) $options->setFlag('-n');
		if ($this->bookmarks) $options->setFlag('-B');
		if ($this->noMerges) $options->setFlag('-M');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
