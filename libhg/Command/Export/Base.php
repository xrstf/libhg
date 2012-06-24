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
 * Generated base class for `hg export`
 *
 * @generated
 * @see     http://selenic.com/hg/help/export
 * @package libhg.Command.Export
 */
abstract class libhg_Command_Export_Base extends libhg_Command_Base {
	/**
	 * optional 'revs' arguments
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * optional 'output' option (-o)
	 *
	 * @var string
	 */
	protected $output = null;

	/**
	 * 'switchParent' flag (--switch-parent)
	 *
	 * @var boolean
	 */
	protected $switchParent = false;

	/**
	 * 'text' flag (-a)
	 *
	 * @var boolean
	 */
	protected $text = false;

	/**
	 * 'git' flag (-g)
	 *
	 * @var boolean
	 */
	protected $git = false;

	/**
	 * 'noDates' flag (--nodates)
	 *
	 * @var boolean
	 */
	protected $noDates = false;

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
	}

	/**
	 * get output
	 *
	 * @return string  set value or null if not set
	 */
	public function getOutput() {
		return $this->output;
	}

	/**
	 * get switchParent
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getSwitchParent() {
		return $this->switchParent;
	}

	/**
	 * get text
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getText() {
		return $this->text;
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
	 * get noDates
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoDates() {
		return $this->noDates;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'export'
	 */
	public function getCommandName() {
		return 'export';
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs                a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Export_Base  self
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
	 * @return libhg_Command_Export_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set output
	 *
	 * @param  string $output             the single output argument
	 * @return libhg_Command_Export_Base  self
	 */
	public function output($output) {
		$this->output = $output;
		return $this;
	}

	/**
	 * set or unset switchParent flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Export_Base  self
	 */
	public function switchParent($flag = true) {
		$this->switchParent = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset text flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Export_Base  self
	 */
	public function text($flag = true) {
		$this->text = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset git flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Export_Base  self
	 */
	public function git($flag = true) {
		$this->git = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset noDates flag
	 *
	 * @param  boolean $flag              true to set the flag, false to unset it
	 * @return libhg_Command_Export_Base  self
	 */
	public function noDates($flag = true) {
		$this->noDates = (boolean) $flag;
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
		if ($this->output !== null) $options->setSingle('-o', $this->output);
		if ($this->switchParent) $options->setFlag('--switch-parent');
		if ($this->text) $options->setFlag('-a');
		if ($this->git) $options->setFlag('-g');
		if ($this->noDates) $options->setFlag('--nodates');

		return $options;
	}
}
