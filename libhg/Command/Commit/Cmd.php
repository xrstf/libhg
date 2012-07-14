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
 * Command class for `hg commit`
 *
 * @see     http://selenic.com/hg/help/commit
 * @package libhg.Command.Commit
 */
class libhg_Command_Commit_Cmd extends libhg_Command_Commit_Base {
	public function __construct($message = null, $isFile = false, $user = null, $files = null, $addremove = false, $closeBranch = false) {
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

	public function getCommandOptions() {
		if (empty($this->message)) {
			$file = $this->logfile ? realpath($this->logfile) : false;

			if ($file === false) {
				throw new libhg_Exception('No commit message given or logfile not found.');
			}
		}

		$options = parent::getCommandOptions();
		return $options->setFlag('-v'); // make hg print the commit changeset ID if possible
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Changeset
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output   = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code     = $reader->readReturnValue();
		$lines    = explode("\n", $output);
		$lastLine = end($lines);

		if (preg_match('/^committed changeset (\d+):([0-9a-f]+)$/', $lastLine, $match)) {
			return new libhg_Changeset($repo, $match[2], $match[1]);
		}

		throw new libhg_Exception('Could not parse `commit` output: "'.$lastLine.'".');
	}
}
