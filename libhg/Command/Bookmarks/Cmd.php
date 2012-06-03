<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Bookmarks_Cmd extends libhg_Command_Generic {
	protected function getOptionDefinition() {
		return array(
			'name'     => array('type' => 'single-arg'),
			'rev'      => array('type' => 'single-opt', 'name' => '-r'),
			'rename'   => array('type' => 'single-opt', 'name' => '-m'),
			'force'    => array('type' => 'flag', 'name' => '-f'),
			'delete'   => array('type' => 'flag', 'name' => '-d'),
			'inactive' => array('type' => 'flag', 'name' => '-i')
		);
	}

	public function getCommandName() {
		return 'bookmarks';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$branches = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$branches = empty($branches) ? array() : explode("\n", $branches);
		$code     = $reader->readReturnValue();

		return new libhg_Command_Bookmarks_Result($branches, $code);
	}
}
