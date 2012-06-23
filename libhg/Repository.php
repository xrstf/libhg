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
	public function __construct($path, libhg_Client $client = null) {
		$repo = is_string($path) && !empty($path) ? realpath($path) : false;

		if ($repo === false || !is_dir($repo)) {
			throw new libhg_Exception('Invalid repository path "'.$path.'" given.');
		}

		if (basename($repo) === '.hg') {
			$repo = dirname($repo);
		}
		elseif (!is_dir($repo.DIRECTORY_SEPARATOR.'.hg')) {
			throw new libhg_Exception('Invalid repository path "'.$path.'" given.');
		}

		$this->path   = rtrim($repo, DIRECTORY_SEPARATOR);
		$this->client = $client;
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
	 * instantiate a new command instance
	 *
	 * Class names must be named like 'libhg_Command_[$command]_Cmd'.
	 *
	 * @param  string $commandName      like 'status' or 'push'
	 * @param  mixed  $ctrArg           optional argument for the constructor
	 * @return libhg_Command_Interface
	 */
	public function cmd($commandName, $ctrArg = null) {
		$className = 'libhg_Command_'.ucfirst(strtolower($commandName)).'_Cmd';

		if (!class_exists($className)) {
			throw new libhg_Exception('Could not find class "'.$className.'" for "'.$commandName.'" command.');
		}

		if ($ctrArg === null) {
			$cmd = new $className();
		}
		else {
			$cmd = new $className($ctrArg);
		}

		$client = $this->getClient()->setRepository($this);

		return $cmd->setClient($client);
	}

	/**
	 * starts an archive command
	 *
	 * @return libhg_Command_Archive_Cmd
	 */
	public function archive($destination, $type = null) {
		return $this->cmd('archive', $destination)->type($type);
	}

	/**
	 * starts a summary command
	 *
	 * @return libhg_Command_Summary_Cmd
	 */
	public function summary($remote = false) {
		return $this->cmd('summary')->remote($remote);
	}

	/**
	 * starts a status command
	 *
	 * @return libhg_Command_Status_Cmd
	 */
	public function status($modified = true, $added = true, $deleted = true, $removed = true) {
		return $this->cmd('status')->modified($modified)->added($added)->deleted($deleted)->removed($removed);
	}

	/**
	 * starts a log command
	 *
	 * @return libhg_Command_Log_Cmd
	 */
	public function log() {
		return $this->cmd('log');
	}

	/**
	 * starts an update command
	 *
	 * @return libhg_Command_Update_Cmd
	 */
	public function update($rev = null, $clean = false, $check = false) {
		return $this->cmd('update')->rev($rev)->clean($clean)->check($check);
	}

	/**
	 * starts a tag command
	 *
	 * @return libhg_Command_Tag_Cmd
	 */
	public function tag($name = null, $force = false) {
		return $this->cmd('tag')->name($name)->force($force);
	}
}
