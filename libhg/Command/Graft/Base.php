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
 * Generated base class for `hg graft`
 *
 * @generated
 * @see     http://selenic.com/hg/help/graft
 * @package libhg.Command.Graft
 */
abstract class libhg_Command_Graft_Base extends libhg_Command_Base {
	/**
	 * optional 'revisions' arguments
	 *
	 * @var array
	 */
	protected $revisions = array();

	/**
	 * optional 'user' option (-u)
	 *
	 * @var string
	 */
	protected $user = null;

	/**
	 * optional 'date' option (-d)
	 *
	 * @var string
	 */
	protected $date = null;

	/**
	 * optional 'tool' option (-t)
	 *
	 * @var string
	 */
	protected $tool = null;

	/**
	 * 'continue' flag (-c)
	 *
	 * @var boolean
	 */
	protected $cont = false;

	/**
	 * 'edit' flag (-e)
	 *
	 * @var boolean
	 */
	protected $edit = false;

	/**
	 * 'currentdate' flag (-D)
	 *
	 * @var boolean
	 */
	protected $currentdate = false;

	/**
	 * 'currentuser' flag (-U)
	 *
	 * @var boolean
	 */
	protected $currentuser = false;

	/**
	 * 'dryRun' flag (-n)
	 *
	 * @var boolean
	 */
	protected $dryRun = false;

	/**
	 * get revisions
	 *
	 * @return array  set revisions or array() if not set
	 */
	public function getRevisions() {
		return $this->revisions;
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
	 * get date
	 *
	 * @return string  set value or null if not set
	 */
	public function getDate() {
		return $this->date;
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
	 * get continue
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getContinue() {
		return $this->cont;
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
	 * get currentdate
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCurrentdate() {
		return $this->currentdate;
	}

	/**
	 * get currentuser
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCurrentuser() {
		return $this->currentuser;
	}

	/**
	 * get dryRun
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDryRun() {
		return $this->dryRun;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'graft'
	 */
	public function getCommandName() {
		return 'graft';
	}

	/**
	 * append a single or multiple revisions
	 *
	 * @param  mixed $revisions          a single (scalar) or multiple (array) revisions
	 * @return libhg_Command_Graft_Base  self
	 */
	public function rev($revisions) {
		foreach ((array) $revisions as $val) {
			$this->revisions[] = $val;
		}

		return $this;
	}

	/**
	 * reset revisions
	 *
	 * @return libhg_Command_Graft_Base  self
	 */
	public function resetRevisions() {
		$this->revisions = array();
		return $this;
	}

	/**
	 * set user
	 *
	 * @param  string $user              the single user argument
	 * @return libhg_Command_Graft_Base  self
	 */
	public function user($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date              the single date argument
	 * @return libhg_Command_Graft_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set tool
	 *
	 * @param  string $tool              the single tool argument
	 * @return libhg_Command_Graft_Base  self
	 */
	public function tool($tool) {
		$this->tool = $tool;
		return $this;
	}

	/**
	 * set or unset continue flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Graft_Base  self
	 */
	public function cont($flag = true) {
		$this->cont = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset edit flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Graft_Base  self
	 */
	public function edit($flag = true) {
		$this->edit = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset currentdate flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Graft_Base  self
	 */
	public function currentdate($flag = true) {
		$this->currentdate = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset currentuser flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Graft_Base  self
	 */
	public function currentuser($flag = true) {
		$this->currentuser = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset dryRun flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Graft_Base  self
	 */
	public function dryRun($flag = true) {
		$this->dryRun = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->revisions)) {
			foreach ($this->revisions as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->user !== null) $options->setSingle('-u', $this->user);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->tool !== null) $options->setSingle('-t', $this->tool);
		if ($this->cont) $options->setFlag('-c');
		if ($this->edit) $options->setFlag('-e');
		if ($this->currentdate) $options->setFlag('-D');
		if ($this->currentuser) $options->setFlag('-U');
		if ($this->dryRun) $options->setFlag('-n');

		return $options;
	}
}
