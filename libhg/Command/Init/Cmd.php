<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Init_Cmd extends libhg_Command_Generic {
	public function __construct($dest = null) {
		parent::__construct();
		$this->dest($dest);
	}

	protected function getOptionDefinition() {
		return $this->appendCommunicationOptions(array(
			'dest' => array('type' => 'single-arg')
		));
	}

	public function getCommandName() {
		return 'init';
	}

	public function usesNoRepositoryOption() {
		return true;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return new libhg_Command_Init_Result($output, $code);
	}
}
