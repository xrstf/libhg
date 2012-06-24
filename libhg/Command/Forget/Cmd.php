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
 * Generated command class for `hg forget`
 *
 * @generated
 * @see     http://selenic.com/hg/help/forget
 * @package libhg.Command.Forget
 */
class libhg_Command_Forget_Cmd extends libhg_Command_Forget_Base {
	public function getCommandOptions() {
		// make hg show the removed files
		return parent::getCommandOptions()->setFlag('-v');
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Forget_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$files = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$files = empty($files) ? array() : explode("\n", $files);
		$code  = $reader->readReturnValue();

		// cut off the 'removing ' prefix
		foreach ($files as $idx => $file) {
			if (substr($file, 0, 9) === 'removing ') {
				$files[$idx] = substr($file, 9);
			}
		}

		return new libhg_Command_Forget_Result($files, $code);
	}
}
