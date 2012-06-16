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
 * Generated base class for `hg parents`
 *
 * @generated
 * @see http://selenic.com/hg/help/parents
 */
abstract class libhg_Command_Parents_Base extends libhg_Command_Base {
	/**
	 * optional 'file' argument
	 *
	 * @var string
	 */
	protected $file = null;

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * get file
	 *
	 * @return string  set value or null if not set
	 */
	public function getFile() {
		return $this->file;
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
	 * get command name
	 *
	 * @return string  always 'parents'
	 */
	public function getCommandName() {
		return 'parents';
	}

	/**
	 * set file
	 *
	 * @param  string $file                the single file argument
	 * @return libhg_Command_Parents_Base  self
	 */
	public function file($file) {
		$this->file = $file;
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev                 the single rev argument
	 * @return libhg_Command_Parents_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->file !== null) $options->addArgument($this->file);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);

		return $options;
	}
}
