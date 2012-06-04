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
 * Generated command class for `hg clone`
 *
 * @see       http://selenic.com/hg/help/clone
 * @generated 2012-06-04 03:27
 */
class libhg_Command_Clone_Cmd extends libhg_Command_Clone_Base {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader readable stream
	 * @param  libhg_Stream_Writable      $writer writable stream
	 * @param  libhg_Repository_Interface $repo   used repository
	 * @return libhg_Command_Clone_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return new libhg_Command_Clone_Result($output, $code);
	}
}
