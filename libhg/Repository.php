<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Repository {
	protected $path;
	protected $options;
	protected $client;

	public function __construct($path) {
		$repo = realpath($path);

		if ($repo === false || !is_dir($repo) || !is_dir($repo.DIRECTORY_SEPARATOR.'.hg')) {
			throw new libhg_Exception('Invalid repository path "'.$path.'" given.');
		}

		$this->path    = rtrim($repo, DIRECTORY_SEPARATOR);
		$this->client  = null;
		$this->options = new libhg_Options_Container();

		$this->options->setRepository($this);
	}

	public function getDirectory() {
		return $this->path;
	}

	public function getOptions() {
		return $this->options;
	}

	public function getClient() {
		if ($this->client === null) {
			$this->client = new libhg_Client($this->getOptions());
		}

		return $this->client;
	}

	public function run(libhg_Command_Interface $command) {
		return $this->getClient()->run($command);
	}

	public function log() {
		$cmd = new libhg_Command_Log_Cmd();
		return $cmd->setClient($this->getClient());
	}
}
