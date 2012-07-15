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
 * Generated base class for `hg showconfig`
 *
 * @generated
 * @see     http://selenic.com/hg/help/showconfig
 * @package libhg.Command.Showconfig
 */
abstract class libhg_Command_Showconfig_Base extends libhg_Command_Base {
	/**
	 * 'untrusted' flag (-u)
	 *
	 * @var boolean
	 */
	protected $untrusted = false;

	/**
	 * get untrusted
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUntrusted() {
		return $this->untrusted;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'showconfig'
	 */
	public function getCommandName() {
		return 'showconfig';
	}

	/**
	 * set or unset untrusted flag
	 *
	 * @param  boolean $flag                  true to set the flag, false to unset it
	 * @return libhg_Command_Showconfig_Base  self
	 */
	public function untrusted($flag = true) {
		$this->untrusted = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->untrusted) $options->setFlag('-u');

		return $options;
	}
}
