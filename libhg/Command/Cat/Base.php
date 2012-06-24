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
 * Generated base class for `hg cat`
 *
 * @generated
 * @see     http://selenic.com/hg/help/cat
 * @package libhg.Command.Cat
 */
abstract class libhg_Command_Cat_Base extends libhg_Command_Base {
	/**
	 * 'files' arguments
	 *
	 * @var array
	 */
	protected $files = array();

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
	 * optional 'output' option (-o)
	 *
	 * @var string
	 */
	protected $output = null;

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * 'decode' flag (--decode)
	 *
	 * @var boolean
	 */
	protected $decode = false;

	/**
	 * get files
	 *
	 * @return array  set files or array() if not set
	 */
	public function getFiles() {
		return $this->files;
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
	 * get output
	 *
	 * @return string  set value or null if not set
	 */
	public function getOutput() {
		return $this->output;
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
	 * get decode
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDecode() {
		return $this->decode;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'cat'
	 */
	public function getCommandName() {
		return 'cat';
	}

	/**
	 * append a single or multiple files
	 *
	 * @param  mixed $files            a single (scalar) or multiple (array) files
	 * @return libhg_Command_Cat_Base  self
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
	 * @return libhg_Command_Cat_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * append a single or multiple include
	 *
	 * @param  mixed $incl             a single (scalar) or multiple (array) include
	 * @return libhg_Command_Cat_Base  self
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
	 * @return libhg_Command_Cat_Base  self
	 */
	public function resetInclude() {
		$this->incl = array();
		return $this;
	}

	/**
	 * append a single or multiple exclude
	 *
	 * @param  mixed $exclude          a single (scalar) or multiple (array) exclude
	 * @return libhg_Command_Cat_Base  self
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
	 * @return libhg_Command_Cat_Base  self
	 */
	public function resetExclude() {
		$this->exclude = array();
		return $this;
	}

	/**
	 * set output
	 *
	 * @param  string $output          the single output argument
	 * @return libhg_Command_Cat_Base  self
	 */
	public function output($output) {
		$this->output = $output;
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev             the single rev argument
	 * @return libhg_Command_Cat_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set or unset decode flag
	 *
	 * @param  boolean $flag           true to set the flag, false to unset it
	 * @return libhg_Command_Cat_Base  self
	 */
	public function decode($flag = true) {
		$this->decode = (boolean) $flag;
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
		if (!empty($this->incl)) $options->setMultiple('-I', $this->incl);
		if (!empty($this->exclude)) $options->setMultiple('-X', $this->exclude);
		if ($this->output !== null) $options->setSingle('-o', $this->output);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->decode) $options->setFlag('--decode');

		return $options;
	}
}
