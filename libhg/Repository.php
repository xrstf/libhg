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
 * Repository wrapper
 *
 * This class wraps a single repository, given by the working directory's
 * path.
 */
class libhg_Repository implements libhg_Repository_Interface {
	protected $path;   ///< string
	protected $client; ///< libhg_Client_Interface

	/**
	 * Constructor
	 *
	 * @param string $path  full path to a working directory (without the '/.hg')
	 */
	public function __construct($path) {
		$repo = realpath($path);

		if ($repo === false || !is_dir($repo) || !is_dir($repo.DIRECTORY_SEPARATOR.'.hg')) {
			throw new libhg_Exception('Invalid repository path "'.$path.'" given.');
		}

		$this->path   = rtrim($repo, DIRECTORY_SEPARATOR);
		$this->client = null;
	}

	/**
	 * get directory
	 *
	 * @return string  path without trailing directory separator
	 */
	public function getDirectory() {
		return $this->path;
	}

	/**
	 * set client to use
	 *
	 * @param  libhg_Client_Interface $client
	 * @return libhg_Repository                self
	 */
	public function setClient(libhg_Client_Interface $client) {
		$this->client = $client;
		return $this;
	}

	/**
	 * get client
	 *
	 * @return libhg_Client_Interface
	 */
	public function getClient() {
		if ($this->client === null) {
			$options = new libhg_Options_Container();
			$this->client = new libhg_Client($options, $this);
		}

		return $this->client;
	}

	/**
	 * get hgrc wrapper
	 *
	 * @return libhg_Hgrc  wrapper (does not mean that the file actually exists)
	 */
	public function getHgrc() {
		$file = $this->path.DIRECTORY_SEPARATOR.'.hg'.DIRECTORY_SEPARATOR.'hgrc';
		$hgrc = new libhg_Hgrc($file);

		return $hgrc;
	}

	/**
	 * Run a command
	 *
	 * @param  libhg_Command_Interface $command  the command to run
	 * @return mixed                             the command's return value
	 */
	public function run(libhg_Command_Interface $command) {
		return $this->getClient()->run($command, $this);
	}

	/**
	 * starts a log command
	 *
	 * @return libhg_Command_Log_Cmd
	 */
	public function log() {
		$cmd    = new libhg_Command_Log_Cmd();
		$client = $this->getClient()->setRepository($this);

		return $cmd->setClient($client);
	}

	/**
	 * starts an update command
	 *
	 * @return libhg_Command_Update_Cmd
	 */
	public function update($rev = null, $clean = false, $check = false) {
		$cmd    = new libhg_Command_Log_Cmd();
		$client = $this->getClient()->setRepository($this);

		return $cmd->setClient($client)->rev($rev)->clean($clean)->check($check);
	}

	/**
	 * starts a tag command
	 *
	 * @return libhg_Command_Tag_Cmd
	 */
	public function tag($name = null, $force = false) {
		$cmd    = new libhg_Command_Tag_Cmd();
		$client = $this->getClient()->setRepository($this);

		return $cmd->setClient($client)->name($name)->force($force);
	}
}
