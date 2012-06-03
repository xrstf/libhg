<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Bundle_Cmd extends libhg_Command_Commit_Cmd {
	public function __construct($file) {
		parent::__construct();
		$this->file($file);
	}

	protected function getOptionDefinition() {
		return $this->appendCommunicationOptions(array(
			'file' => array('type' => 'single-arg'),
			'dest' => array('type' => 'single-arg'),

			'revs'     => array('type' => 'multi-opt', 'name' => '-r', 'alias' => 'rev'),
			'branches' => array('type' => 'multi-opt', 'name' => '-r', 'alias' => 'branch'),
			'bases'    => array('type' => 'multi-opt', 'name' => '--base', 'alias' => 'base'),

			'type' => array('type' => 'single-opt', 'name' => '-t'),

			'force' => array('type' => 'flag', 'name' => '-f'),
			'all'   => array('type' => 'flag', 'name' => '-a')
		));
	}

	public function getCommandName() {
		return 'bundle';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Bundle_Result($annotation, $code);
	}
}
