<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Archive_Cmd extends libhg_Command_Generic {
	public function __construct($destination, $type = null) {
		parent::__construct();

		$this->dest($destination);
		$this->type($type);
	}

	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'dest' => array('type' => 'single-arg'),

			'prefix' => array('type' => 'single-opt', 'name' => '-p'),
			'rev'    => array('type' => 'single-opt', 'name' => '-r'),
			'type'   => array('type' => 'single-opt', 'name' => '-t'),

			'noDecode' => array('type' => 'flag'),
			'subrepos' => array('type' => 'flag', 'name' => '-S')
		));
	}

	public function getCommandName() {
		return 'archive';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Archive_Result($annotation, $code);
	}
}
