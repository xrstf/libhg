<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Summary_Cmd extends libhg_Command_Summary_Base {
	public function __construct($remote = false) {
		$this->remote($remote);
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Summary_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = $reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $reader->readReturnValue();

		return $this->parseOutput($output, $code, $repo);
	}

	/**
	 * parse command output
	 *
	 * @param  string                     $output  output
	 * @param  int                        $code    return value
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Summary_Result
	 */
	protected function parseOutput($output, $code, libhg_Repository_Interface $repo) {
		$output    = trim($output);
		$lines     = explode("\n", $output);
		$parents   = array();
		$bookmarks = array();
		$branch    = null;
		$status    = null;
		$remote    = null;
		$update    = null;

		while (!empty($lines)) {
			$line  = array_shift($lines);
			$parts = explode(': ', $line, 2);

			if (count($parts) !== 2) {
				throw new libhg_Exception('Could not parse command output. Expected identifier row, but found "'.$line.'".');
			}

			list ($identifier, $value) = $parts;

			switch ($identifier) {
				case 'parent':
					if (!preg_match('/^([0-9-]+):([0-9a-f]+)( .+)?$/', $value, $match)) {
						throw new libhg_Exception('Found invalid parent row "'.$line.'".');
					}

					$tags      = !empty($match[3]) ? explode(' ', trim($match[3])) : array();
					$message   = trim(array_shift($lines));
					$parents[] = new libhg_Changeset($repo, $match[2], (int) $match[1], null, null, null, $message, null, $tags);
					break;

				case 'branch':
					$branch = trim($value);
					break;

				case 'commit':
					$status = trim($value);
					break;

				case 'update':
					$update = trim($value);
					break;

				case 'bookmarks':
					$bookmarks = explode(' ', $value);
					break;

				case 'remote':
					$remote = trim($value);
					break;

				default:
					throw new libhg_Exception('Found unknown row "'.$line.'".');
					break;
			}
		}

		return new libhg_Command_Summary_Result($parents, $branch, $status, $update, $bookmarks, $remote, $code);
	}
}
