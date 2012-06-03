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
class libhg_Client implements libhg_Client_Interface {
	private $process; ///< resource
	private $stdin;   ///< libhg_Stream_Writable  hg -> PHP
	private $stdout;  ///< libhg_Stream_Readable  PHP -> hg
	private $open;    ///< boolean

	protected $capabilities = null; ///< array
	protected $options;             ///< libhg_Options_Interface
	protected $repo;                ///< libhg_Repository_Interface

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
	 * This spawns a new hg instance and connects to its STDIN/STDOUT.
	 *
	 * @param  string $errorLog  optional error log filename
	 * @return libhg_Client      self
	 */
	public function connect($errorLog = null) {
		if ($this->open) $this->close();

		$cmd         = 'hg serve --cmdserver pipe';
		$pipes       = null;
		$descriptors = array(
			libhg_Stream::STDIN  => array('pipe', 'r'),
			libhg_Stream::STDOUT => array('pipe', 'w')
		);

		if ($errorLog !== null) {
			$descriptors[libhg_Stream::STDERR] = array('file', $errorLog, 'a');
		}

		$this->process = proc_open($cmd, $descriptors, $pipes, $this->repo->getDirectory());

		if (!is_resource($this->process)) {
			throw new libhg_Exception('Could not start command server.');
		}

		$this->stdin  = new libhg_Stream($pipes[libhg_Stream::STDIN]);
		$this->stdout = new libhg_Stream($pipes[libhg_Stream::STDOUT]);
		$this->open   = true;

		// read hello message and capabilities
		$this->readHello();

		return $this;
	}

	/**
	 * Close connection
	 *
	 * @return boolean
	 */
	public function close() {
		if (!$this->open) return false;

		$this->stdin->close();
		$this->stdout->close();

		$retval = proc_close($this->process);
		$this->reset();

		return $retval === 0;
	}

	/**
	 * Read server's hello message
	 */
	protected function readHello() {
		$cmd    = new libhg_Command_Hello_Cmd();
		$writer = $this->getWritableStream();
		$reader = $this->getReadableStream();
		$result = $cmd->evaluate($reader, $writer, $this->repo);

		if ($result->encoding !== 'UTF-8') {
			throw new libhg_Exception('Encoding mismatch. Server must be using UTF-8, but uses '.$enc.'.');
		}

		if (!in_array('runcommand', $result->capabilities)) {
			throw new libhg_Exception('Server does not support "runcommand" capability.');
		}

		$this->capabilities = $result->capabilities;
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

		$options->setRepository($repo);
		$options = $options->toArray();

		array_unshift($options, $name);

		$msg = implode(chr(0), $options);
		$len = strlen($msg);

		$writer = $this->getWritableStream();
		$reader = $this->getReadableStream();

		$writer->write("runcommand\n");
		$writer->writeInt($len);
		$writer->write($msg);

		return $command->evaluate($reader, $writer, $this->repo);
	}
}
