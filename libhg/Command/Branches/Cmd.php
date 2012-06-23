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
 * Command class for `hg branches`
 *
 * @see http://selenic.com/hg/help/branches
 */
class libhg_Command_Branches_Cmd extends libhg_Command_Branches_Base {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Branches_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$branches = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$branches = empty($branches) ? array() : explode("\n", $branches);
		$code     = $reader->readReturnValue();

		return new libhg_Command_Branches_Result($branches, $code);
	}
}
