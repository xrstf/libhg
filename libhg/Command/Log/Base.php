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
 * Generated base class for `hg log`
 *
 * @generated
 * @see http://selenic.com/hg/help/log
 */
abstract class libhg_Command_Log_Base extends libhg_Command_Base {
	/**
	 * optional 'file' argument
	 *
	 * @var string
	 */
	protected $file = null;

	/**
	 * optional 'keywords' options (-k)
	 *
	 * @var array
	 */
	protected $keywords = array();

	/**
	 * optional 'revs' options (--rev)
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * optional 'users' options (-u)
	 *
	 * @var array
	 */
	protected $users = array();

	/**
	 * optional 'branches' options (-b)
	 *
	 * @var array
	 */
	protected $branches = array();

	/**
	 * optional 'prunes' options (-P)
	 *
	 * @var array
	 */
	protected $prunes = array();

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
	 * optional 'date' option (-d)
	 *
	 * @var string
	 */
	protected $date = null;

	/**
	 * optional 'limit' option (-l)
	 *
	 * @var string
	 */
	protected $limit = null;

	/**
	 * 'follow' flag (-f)
	 *
	 * @var boolean
	 */
	protected $follow = false;

	/**
	 * 'copies' flag (-C)
	 *
	 * @var boolean
	 */
	protected $copies = false;

	/**
	 * 'removed' flag (--removed)
	 *
	 * @var boolean
	 */
	protected $removed = false;

	/**
	 * 'noMerges' flag (-M)
	 *
	 * @var boolean
	 */
	protected $noMerges = false;

	/**
	 * get file
	 *
	 * @return string  set value or null if not set
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * get keywords
	 *
	 * @return array  set keywords or array() if not set
	 */
	public function getKeywords() {
		return $this->keywords;
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
	 * get users
	 *
	 * @return array  set users or array() if not set
	 */
	public function getUsers() {
		return $this->users;
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
	 * get prunes
	 *
	 * @return array  set prunes or array() if not set
	 */
	public function getPrunes() {
		return $this->prunes;
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
	 * get date
	 *
	 * @return string  set value or null if not set
	 */
	public function getDate() {
		return $this->date;
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
	 * get follow
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getFollow() {
		return $this->follow;
	}

	/**
	 * get copies
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCopies() {
		return $this->copies;
	}

	/**
	 * get removed
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getRemoved() {
		return $this->removed;
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
	 * get command name
	 *
	 * @return string  always 'log'
	 */
	public function getCommandName() {
		return 'log';
	}

	/**
	 * set file
	 *
	 * @param  string $file            the single file argument
	 * @return libhg_Command_Log_Base  self
	 */
	public function file($file) {
		$this->file = $file;
		return $this;
	}

	/**
	 * append a single or multiple keywords
	 *
	 * @param  mixed $keywords         a single (scalar) or multiple (array) keywords
	 * @return libhg_Command_Log_Base  self
	 */
	public function keyword($keywords) {
		foreach ((array) $keywords as $val) {
			$this->keywords[] = $val;
		}

		return $this;
	}

	/**
	 * reset keywords
	 *
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetKeywords() {
		$this->keywords = array();
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs             a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Log_Base  self
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
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple users
	 *
	 * @param  mixed $users            a single (scalar) or multiple (array) users
	 * @return libhg_Command_Log_Base  self
	 */
	public function user($users) {
		foreach ((array) $users as $val) {
			$this->users[] = $val;
		}

		return $this;
	}

	/**
	 * reset users
	 *
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetUsers() {
		$this->users = array();
		return $this;
	}

	/**
	 * append a single or multiple branches
	 *
	 * @param  mixed $branches         a single (scalar) or multiple (array) branches
	 * @return libhg_Command_Log_Base  self
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
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	/**
	 * append a single or multiple prunes
	 *
	 * @param  mixed $prunes           a single (scalar) or multiple (array) prunes
	 * @return libhg_Command_Log_Base  self
	 */
	public function prune($prunes) {
		foreach ((array) $prunes as $val) {
			$this->prunes[] = $val;
		}

		return $this;
	}

	/**
	 * reset prunes
	 *
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetPrunes() {
		$this->prunes = array();
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl             a single (scalar) or multiple (array) include
	 * @return libhg_Command_Log_Base  self
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
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude          a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Log_Base  self
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
	 * @return libhg_Command_Log_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date            the single date argument
	 * @return libhg_Command_Log_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set limit
	 *
	 * @param  string $limit           the single limit argument
	 * @return libhg_Command_Log_Base  self
	 */
	public function limit($limit) {
		$this->limit = $limit;
		return $this;
	}

	/**
	 * set or unset follow flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Log_Base  self
	 */
	public function follow($flag = true) {
		$this->follow = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset copies flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Log_Base  self
	 */
	public function copies($flag = true) {
		$this->copies = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset removed flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Log_Base  self
	 */
	public function removed($flag = true) {
		$this->removed = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset noMerges flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Log_Base  self
	 */
	public function noMerges($flag = true) {
		$this->noMerges = (boolean) $flag;
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
		if (!empty($this->keywords)) $options->setMultiple('-k', $this->keywords);
		if (!empty($this->revs)) $options->setMultiple('--rev', $this->revs);
		if (!empty($this->users)) $options->setMultiple('-u', $this->users);
		if (!empty($this->branches)) $options->setMultiple('-b', $this->branches);
		if (!empty($this->prunes)) $options->setMultiple('-P', $this->prunes);
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->limit !== null) $options->setSingle('-l', $this->limit);
		if ($this->follow) $options->setFlag('-f');
		if ($this->copies) $options->setFlag('-C');
		if ($this->removed) $options->setFlag('--removed');
		if ($this->noMerges) $options->setFlag('-M');

		return $options;
	}
}
