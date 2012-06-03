<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Commit_Cmd extends libhg_Command_Generic {
	public function __construct($message = null, $isFile = false, $user = null, $files = null, $addremove = false, $closeBranch = false) {
		parent::__construct();

		if ($message) {
			if ($isFile) {
				$this->logfile($message);
			}
			else {
				$this->message($message);
			}
		}

		$this->user($user);
		$this->addremove($addremove);
		$this->closeBranch($closeBranch);
		$this->files((array) $files);
	}

	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'files' => array('type' => 'multi-arg', 'alias' => 'file'),

			'message' => array('type' => 'single-opt', 'name' => '-m'),
			'logfile' => array('type' => 'single-opt', 'name' => '-l'),
			'date'    => array('type' => 'single-opt', 'name' => '-d'),
			'user'    => array('type' => 'single-opt', 'name' => '-u'),

			'addremove'   => array('type' => 'flag', 'name' => '-A'),
			'closeBranch' => array('type' => 'flag'),
			'amend'       => array('type' => 'flag'),
			'subrepos'    => array('type' => 'flag', 'name' => '-S')
		));
	}

	public function getCommandName() {
		return 'commit';
	}

	public function getCommandOptions() {
		$messageOpt = $this->options['message'];
		$logfileOpt = $this->options['logfile'];

		if (empty($messageOpt['value'])) {
			$file = $logfileOpt['value'] ? realpath($logfileOpt['value']) : false;

			if ($file === false) {
				throw new libhg_Exception('No commit message given or logfile not found.');
			}
		}

		return parent::getCommandOptions();
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return new libhg_Command_Commit_Result($output, $code);
	}
}
