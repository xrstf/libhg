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
 * Generated base class for `hg bundle`
 *
 * @see       http://selenic.com/hg/help/bundle
 * @generated 2012-06-04 01:30
 */
abstract class libhg_Command_Bundle_Base extends libhg_Command_Base {
	/**
	 * 'file' argument
	 *
	 * @var string
	 */
	protected $file = null;

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
	 * optional 'bases' options (--base)
	 *
	 * @var array
	 */
	protected $bases = array();

	/**
	 * optional 'type' option (-t)
	 *
	 * @var string
	 */
	protected $type = null;

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
	 * 'all' flag (-a)
	 *
	 * @var boolean
	 */
	protected $all = false;

	/**
	 * 'insecure' flag (--insecure)
	 *
	 * @var boolean
	 */
	protected $insecure = false;

	/**
	 * get file
	 *
	 * @return string  set value or null if not set
	 */
	public function getFile() {
		return $this->file;
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
	 * get bases
	 *
	 * @return array  set bases or array() if not set
	 */
	public function getBases() {
		return $this->bases;
	}

	/**
	 * get type
	 *
	 * @return string  set value or null if not set
	 */
	public function getType() {
		return $this->type;
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
	 * get all
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAll() {
		return $this->all;
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
	 * @return string  always 'bundle'
	 */
	public function getCommandName() {
		return 'bundle';
	}

	/**
	 * set file
	 *
	 * @param  string $file
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function file($file) {
		$this->file = $file;
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Bundle_Base  self
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
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append multiple branches
	 *
	 * @param  array $branches
	 * @return libhg_Command_Bundle_Base  self
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
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function branch($branch) {
		$this->branches[] = $branch;
		return $this;
	}

	/**
	 * reset branches
	 *
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * append multiple bases
	 *
	 * @param  array $bases
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function bases(array $bases) {
		foreach ($bases as $val) {
			$this->bases[] = $val;
		}

		return $this;
	}

	/**
	 * append a single base
	 *
	 * @param  array $base
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function base($base) {
		$this->bases[] = $base;
		return $this;
	}

	/**
	 * reset bases
	 *
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function resetBases() {
		$this->bases = array();
		return $this;
	}

	/**
	 * set type
	 *
	 * @param  string $type
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function type($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * set ssh
	 *
	 * @param  string $ssh
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function ssh($ssh) {
		$this->ssh = $ssh;
		return $this;
	}

	/**
	 * set remoteCmd
	 *
	 * @param  string $remoteCmd
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function remoteCmd($remoteCmd) {
		$this->remoteCmd = $remoteCmd;
		return $this;
	}

	/**
	 * set force
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set all
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Bundle_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set insecure
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Bundle_Base  self
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

		if ($this->file !== null) $options->addArgument($this->file);
		if ($this->dest !== null) $options->addArgument($this->dest);
		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if (!empty($this->branches)) $options->setMultiple('-b', $this->branches);
		if (!empty($this->bases)) $options->setMultiple('--base', $this->bases);
		if ($this->type !== null) $options->setSingle('-t', $this->type);
		if ($this->ssh !== null) $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->force) $options->setFlag('-f');
		if ($this->all) $options->setFlag('-a');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
