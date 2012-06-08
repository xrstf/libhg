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
 * Generated base class for `hg update`
 *
 * @generated
 * @see http://selenic.com/hg/help/update
 */
abstract class libhg_Command_Update_Base extends libhg_Command_Base {
	/**
	 * optional 'date' option (-d)
	 *
	 * @var string
	 */
	protected $date = null;

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * 'clean' flag (-C)
	 *
	 * @var boolean
	 */
	protected $clean = false;

	/**
	 * 'check' flag (-c)
	 *
	 * @var boolean
	 */
	protected $check = false;

	/**
	 * get date
	 *
	 * @return string  set value or null if not set
	 */
	public function getDate() {
		return $this->date;
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
	 * get clean
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getClean() {
		return $this->clean;
	}

	/**
	 * get check
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getCheck() {
		return $this->check;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'update'
	 */
	public function getCommandName() {
		return 'update';
	}

	/**
	 * set date
	 *
	 * @param  string $date
	 * @return libhg_Command_Update_Base  self
	 */
	public function date($date) {
		$this->date = $date;
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev
	 * @return libhg_Command_Update_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set clean
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Update_Base  self
	 */
	public function clean($flag = true) {
		$this->clean = (boolean) $flag;
		return $this;
	}

	/**
	 * set check
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Update_Base  self
	 */
	public function check($flag = true) {
		$this->check = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->date !== null) $options->setSingle('-d', $this->date);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->clean) $options->setFlag('-C');
		if ($this->check) $options->setFlag('-c');

		return $options;
	}
}
