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
 * Generated command class for `hg version`
 *
 * @generated
 * @see     http://selenic.com/hg/help/version
 * @package libhg.Command.Version
 */
class libhg_Command_Version_Cmd extends libhg_Command_Version_Base {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Version_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		if (!preg_match('/^Mercurial Distributed SCM \(version (.+?)\)$/m', $output, $match)) {
			throw new libhg_Exception('Could not idenfity version.');
		}

		return new libhg_Command_Version_Result($match[1]);
	}
}
