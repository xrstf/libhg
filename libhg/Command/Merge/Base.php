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
 * Generated base class for `hg merge`
 *
 * @see       http://selenic.com/hg/help/merge
 * @generated 2012-06-04 04:09
 */
abstract class libhg_Command_Merge_Base extends libhg_Command_Base {
	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * optional 'tool' option (-t)
	 *
	 * @var string
	 */
	protected $tool = null;

	/**
	 * 'force' flag (-f)
	 *
	 * @var boolean
	 */
	protected $force = false;

	/**
	 * 'preview' flag (-P)
	 *
	 * @var boolean
	 */
	protected $preview = false;

	/**
	 * get rev
	 *
	 * @return string  set value or null if not set
	 */
	public function getRev() {
		return $this->rev;
	}

	/**
	 * get tool
	 *
	 * @return string  set value or null if not set
	 */
	public function getTool() {
		return $this->tool;
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
	 * get preview
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPreview() {
		return $this->preview;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'merge'
	 */
	public function getCommandName() {
		return 'merge';
	}

	/**
	 * set rev
	 *
	 * @param  string $rev
	 * @return libhg_Command_Merge_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set tool
	 *
	 * @param  string $tool
	 * @return libhg_Command_Merge_Base  self
	 */
	public function tool($tool) {
		$this->tool = $tool;
		return $this;
	}

	/**
	 * set force
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Merge_Base  self
	 */
	public function force($flag = true) {
		$this->force = (boolean) $flag;
		return $this;
	}

	/**
	 * set preview
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Merge_Base  self
	 */
	public function preview($flag = true) {
		$this->preview = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->tool !== null) $options->setSingle('-t', $this->tool);
		if ($this->force) $options->setFlag('-f');
		if ($this->preview) $options->setFlag('-P');

		return $options;
	}
}
