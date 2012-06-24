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
 * Generated base class for `hg branches`
 *
 * @generated
 * @see     http://selenic.com/hg/help/branches
 * @package libhg.Command.Branches
 */
abstract class libhg_Command_Branches_Base extends libhg_Command_Base {
	/**
	 * 'active' flag (-a)
	 *
	 * @var boolean
	 */
	protected $active = false;

	/**
	 * 'closed' flag (-c)
	 *
	 * @var boolean
	 */
	protected $closed = false;

	/**
	 * get active
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * get closed
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getClosed() {
		return $this->closed;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'branches'
	 */
	public function getCommandName() {
		return 'branches';
	}

	/**
	 * set or unset active flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Branches_Base  self
	 */
	public function active($flag = true) {
		$this->active = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset closed flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Branches_Base  self
	 */
	public function closed($flag = true) {
		$this->closed = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->active) $options->setFlag('-a');
		if ($this->closed) $options->setFlag('-c');

		return $options;
	}
}
