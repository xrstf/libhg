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
 * Generated base class for `hg summary`
 *
 * @see       http://selenic.com/hg/help/summary
 * @generated 2012-06-04 01:30
 */
abstract class libhg_Command_Summary_Base extends libhg_Command_Base {
	/**
	 * 'remote' flag (--remote)
	 *
	 * @var boolean
	 */
	protected $remote = false;

	/**
	 * get remote
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getRemote() {
		return $this->remote;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'summary'
	 */
	public function getCommandName() {
		return 'summary';
	}

	/**
	 * set remote
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Summary_Base  self
	 */
	public function remote($flag = true) {
		$this->remote = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->remote) $options->setFlag('--remote');

		return $options;
	}
}
