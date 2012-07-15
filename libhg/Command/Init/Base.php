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
 * Generated base class for `hg init`
 *
 * @generated
 * @see     http://selenic.com/hg/help/init
 * @package libhg.Command.Init
 */
abstract class libhg_Command_Init_Base extends libhg_Command_Base {
	/**
	 * 'dest' argument
	 *
	 * @var string
	 */
	protected $dest = null;

	/**
	 * 'insecure' flag (--insecure)
	 *
	 * @var boolean
	 */
	protected $insecure = false;

	/**
	 * get dest
	 *
	 * @return string  set value or null if not set
	 */
	public function getDest() {
		return $this->dest;
	}

	/**
	 * get insecure
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getInsecure() {
		return $this->insecure;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'init'
	 */
	public function getCommandName() {
		return 'init';
	}

	/**
	 * set dest
	 *
	 * @param  string $dest             the single dest argument
	 * @return libhg_Command_Init_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * set or unset insecure flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Init_Base  self
	 */
	public function insecure($flag = true) {
		$this->insecure = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->dest !== null) $options->addArgument($this->dest);
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
