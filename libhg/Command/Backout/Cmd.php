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
 * Command class for `hg backout`
 *
 * @see http://selenic.com/hg/help/backout
 */
class libhg_Command_Backout_Cmd extends libhg_Command_Backout_Base {
	public function __construct($rev) {
		$this->rev($rev);
	}

	public function getCommandOptions() {
		if (empty($this->message)) {
			$file = $this->logfile ? realpath($this->logfile) : false;

			if ($file === false) {
				throw new libhg_Exception('No commit message given or logfile not found.');
			}
		}

		return parent::getCommandOptions();
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Backout_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code = $reader->readReturnValue();

		return new libhg_Command_Backout_Result($code);
	}
}
