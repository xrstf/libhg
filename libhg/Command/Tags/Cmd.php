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
 * Generated command class for `hg tags`
 *
 * @generated
 * @see http://selenic.com/hg/help/tags
 */
class libhg_Command_Tags_Cmd extends libhg_Command_Tags_Base {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Tags_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return $this->parseOutput($output, $code, $repo);
	}

	/**
	 * parse command output
	 *
	 * @param  string                     $output  output
	 * @param  int                        $code    return value
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Tags_Result
	 */
	protected function parseOutput($output, $code, libhg_Repository_Interface $repo) {
		$lines = array_filter(explode("\n", $output));
		$tags  = array();

		foreach ($lines as $line) {
			preg_match('/^(.*?)\s([0-9]+):([0-9a-f]+)$/', $line, $match);

			$changeset = new libhg_Changeset($repo, $match[3], (int) $match[2]);
			$tagName   = trim($match[1]);

			$tags[$tagName] = $changeset;
		}

		return new libhg_Command_Tags_Result($tags, $code);
	}
}
