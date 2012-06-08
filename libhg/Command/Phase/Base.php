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
 * Generated base class for `hg phase`
 *
 * @generated
 * @see http://selenic.com/hg/help/phase
 */
abstract class libhg_Command_Phase_Base extends libhg_Command_Base {
	/**
	 * optional 'revs' arguments
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * 'public' flag (-p)
	 *
	 * @var boolean
	 */
	protected $public = false;

	/**
	 * 'draft' flag (-d)
	 *
	 * @var boolean
	 */
	protected $draft = false;

	/**
	 * 'secret' flag (-s)
	 *
	 * @var boolean
	 */
	protected $secret = false;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
	}

	/**
	 * get public
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPublic() {
		return $this->public;
	}

	/**
	 * get draft
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDraft() {
		return $this->draft;
	}

	/**
	 * get secret
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getSecret() {
		return $this->secret;
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
	 * get command name
	 *
	 * @return string  always 'phase'
	 */
	public function getCommandName() {
		return 'phase';
	}

	/**
	 * append multiple revs
	 *
	 * @param  array $revs
	 * @return libhg_Command_Phase_Base  self
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
	 * @return libhg_Command_Phase_Base  self
	 */
	public function rev($rev) {
		$this->revs[] = $rev;
		return $this;
	}

	/**
	 * reset revs
	 *
	 * @return libhg_Command_Phase_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set public
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Phase_Base  self
	 */
	public function public($flag = true) {
		$this->public = (boolean) $flag;
		return $this;
	}

	/**
	 * set draft
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Phase_Base  self
	 */
	public function draft($flag = true) {
		$this->draft = (boolean) $flag;
		return $this;
	}

	/**
	 * set secret
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Phase_Base  self
	 */
	public function secret($flag = true) {
		$this->secret = (boolean) $flag;
		return $this;
	}

	/**
	 * set force
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Phase_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->revs)) {
			foreach ($this->revs as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->public) $options->setFlag('-p');
		if ($this->draft) $options->setFlag('-d');
		if ($this->secret) $options->setFlag('-s');
		if ($this->force) $options->setFlag('-f');

		return $options;
	}
}
