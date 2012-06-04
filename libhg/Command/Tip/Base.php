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
 * Generated base class for `hg tip`
 *
 * @see       http://selenic.com/hg/help/tip
 * @generated 2012-06-04 04:09
 */
abstract class libhg_Command_Tip_Base extends libhg_Command_Base {
	/**
	 * 'patch' flag (-p)
	 *
	 * @var boolean
	 */
	protected $patch = false;

	/**
	 * 'git' flag (-g)
	 *
	 * @var boolean
	 */
	protected $git = false;

	/**
	 * get patch
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPatch() {
		return $this->patch;
	}

	/**
	 * get git
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getGit() {
		return $this->git;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'tip'
	 */
	public function getCommandName() {
		return 'tip';
	}

	/**
	 * set patch
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Tip_Base  self
	 */
	public function patch($flag = true) {
		$this->patch = (boolean) $flag;
		return $this;
	}

	/**
	 * set git
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Tip_Base  self
	 */
	public function git($flag = true) {
		$this->git = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->patch) $options->setFlag('-p');
		if ($this->git) $options->setFlag('-g');

		return $options;
	}
}
