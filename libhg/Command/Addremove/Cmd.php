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
 * Command class for `hg addremove`
 *
 * @see     http://selenic.com/hg/help/addremove
 * @package libhg.Command.Addremove
 */
class libhg_Command_Addremove_Cmd extends libhg_Command_Addremove_Base {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Addremove_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$lines   = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$lines   = empty($lines) ? array() : explode("\n", $lines);
		$code    = $reader->readReturnValue();
		$added   = array();
		$removed = array();
		$renames = array();

		// parse lines
		foreach ($lines as $idx => $line) {
			if (substr($line, 0, 7) === 'adding ') {
				$added[] = substr($line, 7);
			}
			elseif (substr($line, 0, 9) === 'removing ') {
				$added[] = substr($line, 9);
			}
			elseif (preg_match('/^recording removal of (.+?) as rename to (.+?) \(([0-9]+)% similar\)$/', $line, $match)) {
				$renames[] = array(
					'from' => trim($match[1]),
					'to'   => trim($match[2]),
					'sim'  => (int) $match[3]
				);
			}
		}

		return new libhg_Command_Addremove_Result($added, $removed, $renames, $code);
	}
}
