<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Summary_Cmd extends libhg_Command_Generic {
	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array('remote' => array('type' => 'flag')));
	}

	public function __construct($remote = false) {
		parent::__construct();
		$this->remote($remote);
	}

	public function getCommandName() {
		return 'summary';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = $reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $reader->readReturnValue();

		return new libhg_Command_Summary_Result($output, $code);
	}
}
