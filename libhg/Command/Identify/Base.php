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
 * Generated base class for `hg identify`
 *
 * @generated
 * @see     http://selenic.com/hg/help/identify
 * @package libhg.Command.Identify
 */
abstract class libhg_Command_Identify_Base extends libhg_Command_Base {
	/**
	 * optional 'source' argument
	 *
	 * @var string
	 */
	protected $source = null;

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * optional 'ssh' option (-e)
	 *
	 * @var string
	 */
	protected $ssh = null;

	/**
	 * optional 'remoteCmd' option (--remotecmd)
	 *
	 * @var string
	 */
	protected $remoteCmd = null;

	/**
	 * 'num' flag (-n)
	 *
	 * @var boolean
	 */
	protected $num = false;

	/**
	 * 'id' flag (-i)
	 *
	 * @var boolean
	 */
	protected $id = false;

	/**
	 * 'branch' flag (-b)
	 *
	 * @var boolean
	 */
	protected $branch = false;

	/**
	 * 'tags' flag (-t)
	 *
	 * @var boolean
	 */
	protected $tags = false;

	/**
	 * 'bookmarks' flag (-B)
	 *
	 * @var boolean
	 */
	protected $bookmarks = false;

	/**
	 * 'insecure' flag (--insecure)
	 *
	 * @var boolean
	 */
	protected $insecure = false;

	/**
	 * get source
	 *
	 * @return string  set value or null if not set
	 */
	public function getSource() {
		return $this->source;
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
	 * get ssh
	 *
	 * @return string  set value or null if not set
	 */
	public function getSsh() {
		return $this->ssh;
	}

	/**
	 * get remoteCmd
	 *
	 * @return string  set value or null if not set
	 */
	public function getRemoteCmd() {
		return $this->remoteCmd;
	}

	/**
	 * get num
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNum() {
		return $this->num;
	}

	/**
	 * get id
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * get branch
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getBranch() {
		return $this->branch;
	}

	/**
	 * get tags
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getTags() {
		return $this->tags;
	}

	/**
	 * get bookmarks
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getBookmarks() {
		return $this->bookmarks;
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
	 * @return string  always 'identify'
	 */
	public function getCommandName() {
		return 'identify';
	}

	/**
	 * set source
	 *
	 * @param  string $source               the single source argument
	 * @return libhg_Command_Identify_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev                  the single rev argument
	 * @return libhg_Command_Identify_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set ssh
	 *
	 * @param  string $ssh                  the single ssh argument
	 * @return libhg_Command_Identify_Base  self
	 */
	public function ssh($ssh) {
		$this->ssh = $ssh;
		return $this;
	}

	/**
	 * set remoteCmd
	 *
	 * @param  string $remoteCmd            the single remoteCmd argument
	 * @return libhg_Command_Identify_Base  self
	 */
	public function remoteCmd($remoteCmd) {
		$this->remoteCmd = $remoteCmd;
		return $this;
	}

	/**
	 * set or unset num flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Identify_Base  self
	 */
	public function num($flag = true) {
		$this->num = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset id flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Identify_Base  self
	 */
	public function id($flag = true) {
		$this->id = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset branch flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Identify_Base  self
	 */
	public function branch($flag = true) {
		$this->branch = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset tags flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Identify_Base  self
	 */
	public function tags($flag = true) {
		$this->tags = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset bookmarks flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Identify_Base  self
	 */
	public function bookmarks($flag = true) {
		$this->bookmarks = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset insecure flag
	 *
	 * @param  boolean $flag                true to set the flag, false to unset it
	 * @return libhg_Command_Identify_Base  self
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

		if ($this->source !== null) $options->addArgument($this->source);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->ssh !== null) $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->num) $options->setFlag('-n');
		if ($this->id) $options->setFlag('-i');
		if ($this->branch) $options->setFlag('-b');
		if ($this->tags) $options->setFlag('-t');
		if ($this->bookmarks) $options->setFlag('-B');
		if ($this->insecure) $options->setFlag('--insecure');

		return $options;
	}
}
