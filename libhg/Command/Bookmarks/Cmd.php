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
 * Command class for `hg bookmarks`
 *
 * @see     http://selenic.com/hg/help/bookmarks
 * @package libhg.Command.Bookmarks
 */
class libhg_Command_Bookmarks_Cmd extends libhg_Command_Bookmarks_Base {
	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		// don't show infos & force extended format
		return parent::getCommandOptions()->setFlag('-q')->setFlag('-v');
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Bookmarks_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output  = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code    = $reader->readReturnValue();
		$hasList = !$this->inactive && !$this->delete && $this->rename === null && $this->name === null;
		$bkmarks = array();

		if ($hasList && preg_match_all('/^ ([* ]) (.+?)\s*(\d+):([0-9a-f]+)$/m', $output, $matches, PREG_SET_ORDER)) {
			foreach ($matches as $match) {
				$active = $match[1] === '*';
				$name   = $match[2];
				$rev    = (int) $match[3];
				$node   = $match[4];
				$cs     = new libhg_Changeset($repo, $node, $rev);

				$bkmarks[$name] = array(
					'active'    => $active,
					'name'      => $name,
					'changeset' => $cs
				);
			}
		}

		return new libhg_Command_Bookmarks_Result($bkmarks, $code);
	}
}
