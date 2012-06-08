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
 * Generated base class for `hg unbundle`
 *
 * @generated
 * @see http://selenic.com/hg/help/unbundle
 */
abstract class libhg_Command_Unbundle_Base extends libhg_Command_Base {
	/**
	 * 'files' arguments
	 *
	 * @var array
	 */
	protected $files = array();

	/**
	 * 'update' flag (-u)
	 *
	 * @var boolean
	 */
	protected $update = false;

	/**
	 * get files
	 *
	 * @return array  set files or array() if not set
	 */
	public function getFiles() {
		return $this->files;
	}

	/**
	 * get update
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getUpdate() {
		return $this->update;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'unbundle'
	 */
	public function getCommandName() {
		return 'unbundle';
	}

	/**
	 * append multiple files
	 *
	 * @param  array $files
	 * @return libhg_Command_Unbundle_Base  self
	 */
	public function files(array $files) {
		foreach ($files as $val) {
			$this->files[] = $val;
		}

		return $this;
	}

	/**
	 * append a single file
	 *
	 * @param  array $file
	 * @return libhg_Command_Unbundle_Base  self
	 */
	public function file($file) {
		$this->files[] = $file;
		return $this;
	}

	/**
	 * reset files
	 *
	 * @return libhg_Command_Unbundle_Base  self
	 */
	public function resetFiles() {
		$this->files = array();
		return $this;
	}

	/**
	 * set update
	 *
	 * @param  boolean $flag
	 * @return libhg_Command_Unbundle_Base  self
	 */
	public function update($flag = true) {
		$this->update = (boolean) $flag;
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
		if ($this->update) $options->setFlag('-u');

		return $options;
	}
}
