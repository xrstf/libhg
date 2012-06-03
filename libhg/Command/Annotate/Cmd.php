<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Annotate_Cmd extends libhg_Command_Generic {
	public function __construct($initialFile) {
		parent::__construct();
		$this->files((array) $initialFile);
	}

	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'files'             => array('type' => 'multi-arg', 'alias' => 'file'),
			'revs'              => array('type' => 'multi-opt', 'name' => '-r', 'alias' => 'rev'),
			'noFollow'          => array('type' => 'flag'),
			'text'              => array('type' => 'flag', 'name' => '-a'),
			'user'              => array('type' => 'flag', 'name' => '-u'),
			'file'              => array('type' => 'flag', 'name' => '-f'),
			'date'              => array('type' => 'flag', 'name' => '-d'),
			'dateShort'         => array('type' => 'flag', 'name' => '-q'),
			'number'            => array('type' => 'flag', 'name' => '-n'),
			'changeset'         => array('type' => 'flag', 'name' => '-c'),
			'lineNumber'        => array('type' => 'flag', 'name' => '-l'),
			'ignoreAllSpace'    => array('type' => 'flag', 'name' => '-w'),
			'ignoreSpaceChange' => array('type' => 'flag', 'name' => '-b'),
			'ignoreBlankLines'  => array('type' => 'flag', 'name' => '-B')
		));
	}

	public function getCommandName() {
		return 'annotate';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Annotate_Result($annotation, $code);
	}
}
