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
 * @see     http://selenic.com/hg/help/clone
 * @package libhg.Command.Clone
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
	 * @param  string $source            the single source argument
	 * @return libhg_Command_Clone_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest              the single dest argument
	 * @return libhg_Command_Clone_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs               a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Clone_Base  self
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
	 * @return libhg_Command_Clone_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple branches
	 *
	 * @param  mixed $branches           a single (scalar) or multiple (array) branches
	 * @return libhg_Command_Clone_Base  self
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
	 * @return libhg_Command_Clone_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * set updateRev
	 *
	 * @param  string $updateRev         the single updateRev argument
	 * @return libhg_Command_Clone_Base  self
	 */
	public function updateRev($updateRev) {
		$this->updateRev = $updateRev;
		return $this;
	}

	/**
	 * set or unset noUpdate flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Clone_Base  self
	 */
	public function noUpdate($flag = true) {
		$this->noUpdate = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset pull flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Clone_Base  self
	 */
	public function pull($flag = true) {
		$this->pull = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset uncompressed flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Clone_Base  self
	 */
	public function uncompressed($flag = true) {
		$this->uncompressed = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset insecure flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
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
		if ($this->noUpdate) $options->setFlag('-U');
		if ($this->pull) $options->setFlag('--pull');
		if ($this->uncompressed) $options->setFlag('--uncompressed');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
