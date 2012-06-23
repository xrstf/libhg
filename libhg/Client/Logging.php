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
 * Command server client
 */
class libhg_Client_Logging extends libhg_Client {
	protected $logfile;

	/**
	 * Constructor
	 *
	 * @param libhg_Options_Interface    $options
	 * @param libhg_Repository_Interface $repo
	 * @param string                     $logfile
	 */
	public function __construct(libhg_Options_Interface $options, libhg_Repository_Interface $repo, $logfile) {
		parent::__construct($options, $repo);
		$this->logfile = $logfile;
	}

	/**
	 * connect
	 *
	 * This spawns a new hg instance and connects to its STDIN/STDOUT.
	 *
	 * @param  string  $errorLog          optional error log filename
	 * @param  boolean $forceMqExtension  if true, the hg process is spawned with '--config extensions.mq=""'
	 * @return libhg_Client               self
	 */
	public function connect($errorLog = null, $forceMqExtension = true) {
		$format = "%s> CONNECT %s\n";

		// connect
		try {
			$start = microtime(true);
			parent::connect($errorLog, $forceMqExtension);
			$result = sprintf('(%0.2F)', microtime(true) - $start);
		}
		catch (Exception $e) {
			$result = sprintf(' failed: %s', $e->getMessage());
		}

		// log it
		$path = $this->repo->getDirectory();
		$line = sprintf($format, $path, $result);
		file_put_contents($this->logfile, $line, FILE_APPEND);

		if (isset($e)) {
			throw $e;
		}

		return $this;
	}

	/**
	 * Run a command
	 *
	 * @param  libhg_Command_Interface    $command    the command to run
	 * @param  libhg_Repository_Interface $repository explicit repository (otherwise the internally set repository is used)
	 * @return mixed                                  the command's return value
	 */
	public function run(libhg_Command_Interface $command, libhg_Repository_Interface $repository = null) {
		$name    = $command->getCommandName();
		$options = $command->getCommandOptions();
		$options = $this->options->merge($options);
		$repo    = $repository ? $repository : $this->repo;

		if ($command->usesNoRepositoryOption()) {
			$repo = null;
		}

		$format = "%s> hg %s (%0.2Fs)%s\n";

		// make sure no repository is given in the command line
		$options->setRepository(null);

		// build command name à la 'hg status -mardu'
		$options = $options->toArray();
		array_unshift($options, $name);
		$options = implode(' ', $options);
		$error   = '';

		try {
			// execute command
			$start  = microtime(true);
			$retval = parent::run($command, $repository);
			$time   = microtime(true) - $start;
		}
		catch (Exception $e) {
			$time  = microtime(true) - $start;
			$error = ' => ERROR: '.$e->getMessage();
		}

		// log it
		$path = $repo ? $repo->getDirectory() : '(hg)';
		$line = sprintf($format, $path, $options, $time, $error);
		file_put_contents($this->logfile, $line, FILE_APPEND);

		if ($error) {
			throw $e;
		}

		return $retval;
	}
}
