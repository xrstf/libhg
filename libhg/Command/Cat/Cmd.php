<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Cat_Cmd extends libhg_Command_Commit_Cmd {
	public function __construct($files) {
		parent::__construct();
		$this->files($files);
	}

	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'files'  => array('type' => 'multi-arg'),
			'output' => array('type' => 'single-opt', 'name' => '-o'),
			'rev'    => array('type' => 'single-opt', 'name' => '-r'),
			'decode' => array('type' => 'flag')
		));
	}

	public function getCommandName() {
		return 'cat';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Cat_Result($annotation, $code);
	}
}
