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
 * Command class for `hg add`
 *
 * @see     http://selenic.com/hg/help/add
 * @package libhg.Command.Add
 */
class libhg_Command_Add_Cmd extends libhg_Command_Add_Base {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Add_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$files = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$files = empty($files) ? array() : explode("\n", $files);
		$code  = $reader->readReturnValue();

		// cut off the 'adding ' prefix
		foreach ($files as $idx => $file) {
			if (substr($file, 0, 7) === 'adding ') {
				$files[$idx] = substr($file, 7);
			}
		}

		return new libhg_Command_Add_Result($files, $code);
	}
}
