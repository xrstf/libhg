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
 * Generated base class for `hg heads`
 *
 * @generated
 * @see http://selenic.com/hg/help/heads
 */
abstract class libhg_Command_Heads_Base extends libhg_Command_Base {
	/**
	 * optional 'revs' arguments
	 *
	 * @var array
	 */
	protected $revs = array();

	/**
	 * optional 'startrev' option (-r)
	 *
	 * @var string
	 */
	protected $startrev = null;

	/**
	 * 'topo' flag (-t)
	 *
	 * @var boolean
	 */
	protected $topo = false;

	/**
	 * 'closed' flag (-c)
	 *
	 * @var boolean
	 */
	protected $closed = false;

	/**
	 * get revs
	 *
	 * @return array  set revs or array() if not set
	 */
	public function getRevs() {
		return $this->revs;
	}

	/**
	 * get startrev
	 *
	 * @return string  set value or null if not set
	 */
	public function getStartrev() {
		return $this->startrev;
	}

	/**
	 * get topo
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getTopo() {
		return $this->topo;
	}

	/**
	 * get closed
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getClosed() {
		return $this->closed;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'heads'
	 */
	public function getCommandName() {
		return 'heads';
	}

	/**
	 * append a single or multiple revs
	 *
	 * @param  mixed $revs               a single (scalar) or multiple (array) revs
	 * @return libhg_Command_Heads_Base  self
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
	 * @return libhg_Command_Heads_Base  self
	 */
	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	/**
	 * set startrev
	 *
	 * @param  string $startrev          the single startrev argument
	 * @return libhg_Command_Heads_Base  self
	 */
	public function startrev($startrev) {
		$this->startrev = $startrev;
		return $this;
	}

	/**
	 * set or unset topo flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Heads_Base  self
	 */
	public function topo($flag = true) {
		$this->topo = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset closed flag
	 *
	 * @param  boolean $flag             true to set the flag, false to unset it
	 * @return libhg_Command_Heads_Base  self
	 */
	public function closed($flag = true) {
		$this->closed = (boolean) $flag;
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
		if ($this->startrev !== null) $options->setSingle('-r', $this->startrev);
		if ($this->topo) $options->setFlag('-t');
		if ($this->closed) $options->setFlag('-c');

		return $options;
	}
}
