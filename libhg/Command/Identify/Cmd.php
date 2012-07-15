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
 * Command class for `hg identify`
 *
 * @see     http://selenic.com/hg/help/identify
 * @package libhg.Command.Identify
 */
class libhg_Command_Identify_Cmd extends libhg_Command_Identify_Base {
	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = parent::getCommandOptions();

		// show node, rev and branch name
		return $parent->setFlag('-i')->setFlag('-n')->setFlag('-b');
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Identify_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		// "16136d5ef+ 123+ branchname"
		// "000000000+ -1+ default" for newly created repositories
		if (!preg_match('/^([0-9a-f]+\+?) (-?[0-9]+\+?)\s+(.+)$/s', $output, $match)) {
			throw new libhg_Exception('Unexpected output "'.$output.'" encountered.');
		}

		$node   = $match[1];
		$rev    = $match[2];
		$branch = $match[3];
		$dirty  = substr($node, -1) === '+';

		if ($dirty) {
			$node = substr($node, 0, -1);
			$rev  = substr($rev, 0, -1);
		}

		$parent = new libhg_Changeset($repo, $node, (int) $rev, null, null, null, null, $branch);

		return new libhg_Command_Identify_Result($parent, $dirty, $code);
	}
}
