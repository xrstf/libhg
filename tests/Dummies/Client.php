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
 * dummy client
 */
class libhg_Dummies_Client implements libhg_Client_Interface {
	public $stdin;  ///< libhg_Stream_Writable  hg -> PHP
	public $stdout; ///< libhg_Stream_Readable  PHP -> hg
	public $open;   ///< boolean

	public $capabilities = null; ///< array
	public $options;             ///< libhg_Options_Interface
	public $repo;                ///< libhg_Repository_Interface

	/**
	 * Constructor
	 *
	 * @param libhg_Options_Interface    $options
	 * @param libhg_Repository_Interface $repo
	 */
	public function __construct(libhg_Options_Interface $options, libhg_Repository_Interface $repo) {
		$this->reset();

		$this->options = $options;
		$this->repo    = $repo;
	}

	/**
	 * get options
	 *
	 * @return libhg_Options_Interface
	 */
	public function getOptions() {
		return $this->options;
	}

	/**
	 * get capabilities
	 *
	 * @return array
	 */
	public function getCapabilities() {
		return $this->capabilities;
	}

	/**
	 * get writable stream
	 *
	 * @return libhg_Stream_Writable
	 */
	public function getWritableStream() {
		return $this->stdin;
	}

	/**
	 * get readable stream
	 *
	 * @return libhg_Stream_Readable
	 */
	public function getReadableStream() {
		return $this->stdout;
	}

	/**
	 * check is a connection is established
	 *
	 * @return boolean
	 */
	public function isConnected() {
		return $this->open;
	}

	/**
	 * get repository
	 *
	 * @return libhg_Repository_Interface
	 */
	public function getRepository() {
		return $this->repo;
	}

	/**
	 * reset object
	 *
	 * @return libhg_Client  self
	 */
	protected function reset() {
		$this->stdin        = null;
		$this->stdout       = null;
		$this->open         = false;
		$this->process      = false;
		$this->capabilities = array();

		return $this;
	}

	/**
	 * set repository
	 *
	 * @param  libhg_Repository_Interface $repo
	 * @return libhg_Client                      self
	 */
	public function setRepository(libhg_Repository_Interface $repo) {
		$this->repo = $repo;
		return $this;
	}

	/**
	 * set options
	 *
	 * @param  libhg_Options_Interface $options
	 * @return libhg_Client                      self
	 */
	public function setOptions(libhg_Options_Interface $options) {
		$this->options = $options;
		return $this;
	}

	/**
	 * connect
	 *
	 * @return Dummies_Client  self
	 */
	public function connect() {
		if ($this->open) $this->close();
		$this->open = true;
		return $this;
	}

	/**
	 * Close connection
	 *
	 * @return boolean
	 */
	public function close() {
		if (!$this->open) return false;
		$this->reset();
		return true;
	}

	public function run(libhg_Command_Interface $command, libhg_Repository_Interface $repository = null) {
		return array($command, $repository);
	}
}
