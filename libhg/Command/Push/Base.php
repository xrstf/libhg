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
 * Generated base class for `hg push`
 *
 * @generated
 * @see     http://selenic.com/hg/help/push
 * @package libhg.Command.Push
 */
abstract class libhg_Command_Push_Base extends libhg_Command_Base {
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
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'newBranch' flag (--new-branch)
	 *
	 * @var boolean
	 */
	protected $newBranch = false;

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
	 * get force
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getForce() {
		return $this->force;
	}

	/**
	 * get newBranch
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNewBranch() {
		return $this->newBranch;
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
	 * @return string  always 'push'
	 */
	public function getCommandName() {
		return 'push';
	}

	/**
	 * set dest
	 *
	 * @param  string $dest             the single dest argument
	 * @return libhg_Command_Push_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs              a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Push_Base  self
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
	 * @return libhg_Command_Push_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple bookmarks
	 *
	 * @param  mixed $bookmarks         a single (scalar) or multiple (array) bookmarks
	 * @return libhg_Command_Push_Base  self
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
	 * @return libhg_Command_Push_Base  self
	 */
	public function resetBookmarks() {
		$this->bookmarks = array();
		return $this;
	}

	/**
	 * append a single or multiple branches
	 *
	 * @param  mixed $branches          a single (scalar) or multiple (array) branches
	 * @return libhg_Command_Push_Base  self
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
	 * @return libhg_Command_Push_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Push_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset newBranch flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Push_Base  self
	 */
	public function newBranch($flag = true) {
		$this->newBranch = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset insecure flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Push_Base  self
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
		if (!empty($this->bookmarks)) $options->setMultiple('-B', $this->bookmarks);
		if (!empty($this->branches)) $options->setMultiple('-b', $this->branches);
		if ($this->force) $options->setFlag('-f');
		if ($this->newBranch) $options->setFlag('--new-branch');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
