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
 * Command class for `hg fetch`
 *
 * @see     http://selenic.com/hg/help/fetch
 * @package libhg.Command.Fetch
 */
class libhg_Command_Fetch_Cmd extends libhg_Command_Fetch_Base {
	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		// don't show the progress
		return parent::getCommandOptions()->setFlag('-q');
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Fetch_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code = $reader->readReturnValue();

		return new libhg_Command_Fetch_Result($code);
	}
}
