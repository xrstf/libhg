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
 * Generated base class for `hg strip`
 *
 * @generated
 * @see     http://selenic.com/hg/help/strip
 * @package libhg.Command.Strip
 */
abstract class libhg_Command_Strip_Base extends libhg_Command_Base {
	/**
	 * 'revs' arguments
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'noBackup' flag (--no-backup)
	 *
	 * @var boolean
	 */
	protected $noBackup = false;

	/**
	 * 'keep' flag (-k)
	 *
	 * @var boolean
	 */
	protected $keep = false;

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
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
	 * get noBackup
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoBackup() {
		return $this->noBackup;
	}

	/**
	 * get keep
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getKeep() {
		return $this->keep;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'strip'
	 */
	public function getCommandName() {
		return 'strip';
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs               a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Strip_Base  self
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
	 * @return libhg_Command_Strip_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set or unset force flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Strip_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset noBackup flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Strip_Base  self
	 */
	public function noBackup($flag = true) {
		$this->noBackup = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset keep flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Strip_Base  self
	 */
	public function keep($flag = true) {
		$this->keep = (boolean) $flag;
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
		if ($this->force) $options->setFlag('-f');
		if ($this->noBackup) $options->setFlag('--no-backup');
		if ($this->keep) $options->setFlag('-k');

		return $options;
	}
}
