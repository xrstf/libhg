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
 * Generated base class for `hg annotate`
 *
 * @generated
 * @see     http://selenic.com/hg/help/annotate
 * @package libhg.Command.Annotate
 */
abstract class libhg_Command_Annotate_Base extends libhg_Command_Base {
	/**
	 * 'file' argument
	 *
	 * @var string
	 */
	protected $file = null;

	/**
	 * optional 'revs' options (-r)
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * 'noFollow' flag (--no-follow)
	 *
	 * @var boolean
	 */
	protected $noFollow = false;

	/**
	 * 'ignoreAllSpace' flag (-w)
	 *
	 * @var boolean
	 */
	protected $ignoreAllSpace = false;

	/**
	 * 'ignoreSpaceChange' flag (-b)
	 *
	 * @var boolean
	 */
	protected $ignoreSpaceChange = false;

	/**
	 * 'ignoreBlankLines' flag (-B)
	 *
	 * @var boolean
	 */
	protected $ignoreBlankLines = false;

	/**
	 * get file
	 *
	 * @return string  set value or null if not set
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
	}

	/**
	 * get noFollow
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoFollow() {
		return $this->noFollow;
	}

	/**
	 * get ignoreAllSpace
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreAllSpace() {
		return $this->ignoreAllSpace;
	}

	/**
	 * get ignoreSpaceChange
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreSpaceChange() {
		return $this->ignoreSpaceChange;
	}

	/**
	 * get ignoreBlankLines
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreBlankLines() {
		return $this->ignoreBlankLines;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'annotate'
	 */
	public function getCommandName() {
		return 'annotate';
	}

	/**
	 * set file
	 *
	 * @param  string $file                 the single file argument
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function file($file) {
		$this->file = $file;
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs                  a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Annotate_Base  self
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
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set or unset noFollow flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function noFollow($flag = true) {
		$this->noFollow = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreAllSpace flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function ignoreAllSpace($flag = true) {
		$this->ignoreAllSpace = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreSpaceChange flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function ignoreSpaceChange($flag = true) {
		$this->ignoreSpaceChange = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreBlankLines flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Annotate_Base  self
	 */
	public function ignoreBlankLines($flag = true) {
		$this->ignoreBlankLines = (boolean) $flag;
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
		if (!empty($this->revs)) $options->setMultiple('-r', $this->revs);
		if ($this->noFollow) $options->setFlag('--no-follow');
		if ($this->ignoreAllSpace) $options->setFlag('-w');
		if ($this->ignoreSpaceChange) $options->setFlag('-b');
		if ($this->ignoreBlankLines) $options->setFlag('-B');

		return $options;
	}
}
