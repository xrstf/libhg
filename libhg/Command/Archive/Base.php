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
 * Generated base class for `hg archive`
 *
 * @generated
 * @see http://selenic.com/hg/help/archive
 */
abstract class libhg_Command_Archive_Base extends libhg_Command_Base {
	/**
	 * 'dest' argument
	 *
	 * @var string
	 */
	protected $dest = null;

	/**
	 * optional 'prefix' option (-p)
	 *
	 * @var string
	 */
	protected $prefix = null;

	/**
	 * optional 'revs' option (-r)
	 *
	 * @var string
	 */
	protected $revs = null;

	/**
	 * optional 'type' option (-t)
	 *
	 * @var string
	 */
	protected $type = null;

	/**
	 * 'noDecode' flag (--no-decode)
	 *
	 * @var boolean
	 */
	protected $noDecode = false;

	/**
	 * 'subrepos' flag (-S)
	 *
	 * @var boolean
	 */
	protected $subrepos = false;

	/**
	 * get dest
	 *
	 * @return string  set value or null if not set
	 */
	public function getDest() {
		return $this->dest;
	}

	/**
	 * get prefix
	 *
	 * @return string  set value or null if not set
	 */
	public function getPrefix() {
		return $this->prefix;
	}

	/**
	 * get revs
	 *
	 * @return string  set value or null if not set
	 */
	public function getRevs() {
		return $this->revs;
	}

	/**
	 * get type
	 *
	 * @return string  set value or null if not set
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * get noDecode
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getNoDecode() {
		return $this->noDecode;
	}

	/**
	 * get subrepos
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getSubrepos() {
		return $this->subrepos;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'archive'
	 */
	public function getCommandName() {
		return 'archive';
	}

	/**
	 * set dest
	 *
	 * @param  string $dest
	 * @return libhg_Command_Archive_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * set prefix
	 *
	 * @param  string $prefix
	 * @return libhg_Command_Archive_Base  self
	 */
	public function prefix($prefix) {
		$this->prefix = $prefix;
		return $this;
	}

	/**
	 * set revs
	 *
	 * @param  string $revs
	 * @return libhg_Command_Archive_Base  self
	 */
	public function revs($revs) {
		$this->revs = $revs;
		return $this;
	}

	/**
	 * set type
	 *
	 * @param  string $type
	 * @return libhg_Command_Archive_Base  self
	 */
	public function type($type) {
		$this->type = $type;
		return $this;
	}

	/**
	 * set noDecode
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Archive_Base  self
	 */
	public function noDecode($flag = true) {
		$this->noDecode = (boolean) $flag;
		return $this;
	}

	/**
	 * set subrepos
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Archive_Base  self
	 */
	public function subrepos($flag = true) {
		$this->subrepos = (boolean) $flag;
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
		if ($this->prefix !== null) $options->setSingle('-p', $this->prefix);
		if ($this->revs !== null) $options->setSingle('-r', $this->revs);
		if ($this->type !== null) $options->setSingle('-t', $this->type);
		if ($this->noDecode) $options->setFlag('--no-decode');
		if ($this->subrepos) $options->setFlag('-S');

		return $options;
	}
}
