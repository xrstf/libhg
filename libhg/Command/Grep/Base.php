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
 * Generated base class for `hg grep`
 *
 * @generated
 * @see     http://selenic.com/hg/help/grep
 * @package libhg.Command.Grep
 */
abstract class libhg_Command_Grep_Base extends libhg_Command_Base {
	/**
	 * optional 'files' arguments
	 *
	 * @var array
	 */
	protected $files = array();

	/**
	 * optional 'pattern' argument
	 *
	 * @var string
	 */
	protected $pattern = null;

	/**
	 * optional 'revs' options (-I)
	 *
	 * @var array
	 */
	protected $revs = array();

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
	 * 'print0' flag (-0)
	 *
	 * @var boolean
	 */
	protected $print0 = false;

	/**
	 * 'all' flag (--all)
	 *
	 * @var boolean
	 */
	protected $all = false;

	/**
	 * 'text' flag (-a)
	 *
	 * @var boolean
	 */
	protected $text = false;

	/**
	 * 'follow' flag (-f)
	 *
	 * @var boolean
	 */
	protected $follow = false;

	/**
	 * 'ignoreCase' flag (-i)
	 *
	 * @var boolean
	 */
	protected $ignoreCase = false;

	/**
	 * 'filesWithMatches' flag (-l)
	 *
	 * @var boolean
	 */
	protected $filesWithMatches = false;

	/**
	 * 'lineNumber' flag (-n)
	 *
	 * @var boolean
	 */
	protected $lineNumber = false;

	/**
	 * 'user' flag (-u)
	 *
	 * @var boolean
	 */
	protected $user = false;

	/**
	 * 'date' flag (-d)
	 *
	 * @var boolean
	 */
	protected $date = false;

	/**
	 * get files
	 *
	 * @return array  set files or array() if not set
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * get pattern
	 *
	 * @return string  set value or null if not set
	 */
	public function getPattern() {
		return $this->pattern;
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
	 * get print0
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getPrint0() {
		return $this->print0;
	}

	/**
	 * get all
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getAll() {
		return $this->all;
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
	 * get follow
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getFollow() {
		return $this->follow;
	}

	/**
	 * get ignoreCase
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getIgnoreCase() {
		return $this->ignoreCase;
	}

	/**
	 * get filesWithMatches
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getFilesWithMatches() {
		return $this->filesWithMatches;
	}

	/**
	 * get lineNumber
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getLineNumber() {
		return $this->lineNumber;
	}

	/**
	 * get user
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * get date
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'grep'
	 */
	public function getCommandName() {
		return 'grep';
	}

	/**
	 * append a single or multiple files
	 *
	 * @param  mixed $files             a single (scalar) or multiple (array) files
	 * @return libhg_Command_Grep_Base  self
	 */
	public function file($files) {
		foreach ((array) $files as $val) {
			$this->files[] = $val;
		}

		return $this;
	}

	/**
	 * reset files
	 *
	 * @return libhg_Command_Grep_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * set pattern
	 *
	 * @param  string $pattern          the single pattern argument
	 * @return libhg_Command_Grep_Base  self
	 */
	public function pattern($pattern) {
		$this->pattern = $pattern;
		return $this;
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs              a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Grep_Base  self
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
	 * @return libhg_Command_Grep_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl              a single (scalar) or multiple (array) include
	 * @return libhg_Command_Grep_Base  self
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
	 * @return libhg_Command_Grep_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude           a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Grep_Base  self
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
	 * @return libhg_Command_Grep_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set or unset print0 flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function print0($flag = true) {
		$this->print0 = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset all flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function all($flag = true) {
		$this->all = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset text flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function text($flag = true) {
		$this->text = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset follow flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function follow($flag = true) {
		$this->follow = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset ignoreCase flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function ignoreCase($flag = true) {
		$this->ignoreCase = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset filesWithMatches flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function filesWithMatches($flag = true) {
		$this->filesWithMatches = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset lineNumber flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function lineNumber($flag = true) {
		$this->lineNumber = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset user flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function user($flag = true) {
		$this->user = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset date flag
	 *
	 * @param  boolean $flag            true to set the flag, false to unset it
	 * @return libhg_Command_Grep_Base  self
	 */
	public function date($flag = true) {
		$this->date = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if (!empty($this->files)) {
			foreach ($this->files as $val) {
				$options->addArgument($val);
			}
		}
		if ($this->pattern !== null) $options->addArgument($this->pattern);
		if (!empty($this->revs)) $options->setMultiple('-I', $this->revs);
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->print0) $options->setFlag('-0');
		if ($this->all) $options->setFlag('--all');
		if ($this->text) $options->setFlag('-a');
		if ($this->follow) $options->setFlag('-f');
		if ($this->ignoreCase) $options->setFlag('-i');
		if ($this->filesWithMatches) $options->setFlag('-l');
		if ($this->lineNumber) $options->setFlag('-n');
		if ($this->user) $options->setFlag('-u');
		if ($this->date) $options->setFlag('-d');

		return $options;
	}
}
