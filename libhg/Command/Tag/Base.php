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
 * Generated base class for `hg tag`
 *
 * @generated
 * @see http://selenic.com/hg/help/tag
 */
abstract class libhg_Command_Tag_Base extends libhg_Command_Base {
	/**
	 * 'names' arguments
	 *
	 * @var array
	 */
	protected $names = array();

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * optional 'message' option (-m)
	 *
	 * @var string
	 */
	protected $message = null;

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
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'local' flag (-l)
	 *
	 * @var boolean
	 */
	protected $local = false;

	/**
	 * 'remove' flag (--remove)
	 *
	 * @var boolean
	 */
	protected $remove = false;

	/**
	 * get names
	 *
	 * @return array  set names or array() if not set
	 */
	public function getNames() {
		return $this->names;
	}

	/**
	 * get rev
	 *
	 * @return string  set value or null if not set
	 */
	public function getRev() {
		return $this->rev;
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
	 * get force
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getForce() {
		return $this->force;
	}

	/**
	 * get local
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getLocal() {
		return $this->local;
	}

	/**
	 * get remove
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getRemove() {
		return $this->remove;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'tag'
	 */
	public function getCommandName() {
		return 'tag';
	}

	/**
	 * append a single or multiple names
	 *
	 * @param  mixed $names            a single (scalar) or multiple (array) names
	 * @return libhg_Command_Tag_Base  self
	 */
	public function name($names) {
		foreach ((array) $names as $val) {
			$this->names[] = $val;
		}

		return $this;
	}

	/**
	 * reset names
	 *
	 * @return libhg_Command_Tag_Base  self
	 */
	public function resetNames() {
		$this->names = array();
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev             the single rev argument
	 * @return libhg_Command_Tag_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set message
	 *
	 * @param  string $message         the single message argument
	 * @return libhg_Command_Tag_Base  self
	 */
	public function message($message) {
		$this->message = $message;
		return $this;
	}

	/**
	 * set date
	 *
	 * @param  string $date            the single date argument
	 * @return libhg_Command_Tag_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set user
	 *
	 * @param  string $user            the single user argument
	 * @return libhg_Command_Tag_Base  self
	 */
	public function user($user) {
		$this->user = $user;
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Tag_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset local flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Tag_Base  self
	 */
	public function local($flag = true) {
		$this->local = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset remove flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Tag_Base  self
	 */
	public function remove($flag = true) {
		$this->remove = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->names)) {
			foreach ($this->names as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->message !== null) $options->setSingle('-m', $this->message);
		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->user !== null) $options->setSingle('-u', $this->user);
		if ($this->force) $options->setFlag('-f');
		if ($this->local) $options->setFlag('-l');
		if ($this->remove) $options->setFlag('--remove');

		return $options;
	}
}
