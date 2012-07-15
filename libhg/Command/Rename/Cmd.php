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
 * Command class for `hg rename`
 *
 * @see     http://selenic.com/hg/help/rename
 * @package libhg.Command.Rename
 */
class libhg_Command_Rename_Cmd extends libhg_Command_Rename_Base {
	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		// show rename operations
		return parent::getCommandOptions()->setFlag('-v');
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Rename_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$files = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$files = empty($files) ? array() : explode("\n", $files);
		$code  = $reader->readReturnValue();

		// try to match renames
		foreach ($files as $idx => $file) {
			if (preg_match('/^moving (.+?) to (.+?)$/', $file, $match)) {
				$files[$idx] = array('from' => $match[1], 'to' => $match[2]);
			}
			else {
				$files[$idx] = array('text' => $file);
			}
		}

		return new libhg_Command_Rename_Result($files, $code);
	}
}
