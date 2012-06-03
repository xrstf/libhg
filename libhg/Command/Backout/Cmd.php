<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Backout_Cmd extends libhg_Command_Commit_Cmd {
	public function __construct($rev) {
		parent::__construct();
		$this->rev($rev);
	}

	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'rev' => array('type' => 'single-arg'),

			'tool'    => array('type' => 'single-opt', 'name' => '-t'),
			'message' => array('type' => 'single-opt', 'name' => '-m'),
			'logfile' => array('type' => 'single-opt', 'name' => '-t'),
			'date'    => array('type' => 'single-opt', 'name' => '-d'),
			'user'    => array('type' => 'single-opt', 'name' => '-u'),

			'merge' => array('type' => 'flag')
		));
	}

	public function getCommandName() {
		return 'backout';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Backout_Result($annotation, $code);
	}
}
