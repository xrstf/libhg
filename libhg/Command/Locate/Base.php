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
 * Generated base class for `hg locate`
 *
 * @generated
 * @see     http://selenic.com/hg/help/locate
 * @package libhg.Command.Locate
 */
abstract class libhg_Command_Locate_Base extends libhg_Command_Base {
	/**
	 * optional 'patterns' arguments
	 *
	 * @var array
	 */
	protected $patterns = array();

	/**
	 * optional 'include' options (-I)
	 *
	 * @var array
	 */
	protected $incl = array();

	/**
	 * optional 'exclude' options (-X)
	 *
	 * @var array
	 */
	protected $exclude = array();

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * 'print0' flag (-0)
	 *
	 * @var boolean
	 */
	protected $print0 = false;

	/**
	 * 'fullpath' flag (-f)
	 *
	 * @var boolean
	 */
	protected $fullpath = false;

	/**
	 * get patterns
	 *
	 * @return array  set patterns or array() if not set
	 */
	public function getPatterns() {
		return $this->patterns;
	}

	/**
	 * get include
	 *
	 * @return array  set include or array() if not set
	 */
	public function getInclude() {
		return $this->incl;
	}

	/**
	 * get exclude
	 *
	 * @return array  set exclude or array() if not set
	 */
	public function getExclude() {
		return $this->exclude;
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
	 * get print0
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPrint0() {
		return $this->print0;
	}

	/**
	 * get fullpath
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getFullpath() {
		return $this->fullpath;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'locate'
	 */
	public function getCommandName() {
		return 'locate';
	}

	/**
	 * append a single or multiple patterns
	 *
	 * @param  mixed $patterns            a single (scalar) or multiple (array) patterns
	 * @return libhg_Command_Locate_Base  self
	 */
	public function pattern($patterns) {
		foreach ((array) $patterns as $val) {
			$this->patterns[] = $val;
		}

		return $this;
	}

	/**
	 * reset patterns
	 *
	 * @return libhg_Command_Locate_Base  self
	 */
	public function resetPatterns() {
		$this->patterns = array();
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl                a single (scalar) or multiple (array) include
	 * @return libhg_Command_Locate_Base  self
	 */
	public function incl($incl) {
		foreach ((array) $incl as $val) {
			$this->incl[] = $val;
		}

		return $this;
	}

	/**
	 * reset include
	 *
	 * @return libhg_Command_Locate_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude             a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Locate_Base  self
	 */
	public function excl($exclude) {
		foreach ((array) $exclude as $val) {
			$this->exclude[] = $val;
		}

		return $this;
	}

	/**
	 * reset exclude
	 *
	 * @return libhg_Command_Locate_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev                the single rev argument
	 * @return libhg_Command_Locate_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set or unset print0 flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Locate_Base  self
	 */
	public function print0($flag = true) {
		$this->print0 = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset fullpath flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Locate_Base  self
	 */
	public function fullpath($flag = true) {
		$this->fullpath = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->patterns)) {
			foreach ($this->patterns as $val) {
				$options->addArgument($val);
			}
		}
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->print0) $options->setFlag('-0');
		if ($this->fullpath) $options->setFlag('-f');

		return $options;
	}
}
