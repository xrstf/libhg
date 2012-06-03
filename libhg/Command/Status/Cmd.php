<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Status_Cmd extends libhg_Command_Generic {
	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'files'  => array('type' => 'multi-arg', 'alias' => 'file'),
			'revs'   => array('type' => 'multi-opt', 'name' => '--rev', 'alias' => 'rev'),
			'change' => array('type' => 'single-opt'),

			'all'      => array('type' => 'flag', 'name' => '-A'),
			'modified' => array('type' => 'flag', 'name' => '-m', 'value' => true),
			'added'    => array('type' => 'flag', 'name' => '-a', 'value' => true),
			'removed'  => array('type' => 'flag', 'name' => '-r', 'value' => true),
			'deleted'  => array('type' => 'flag', 'name' => '-d', 'value' => true),
			'clean'    => array('type' => 'flag', 'name' => '-c'),
			'unknown'  => array('type' => 'flag', 'name' => '-u', 'value' => true),
			'ignored'  => array('type' => 'flag', 'name' => '-i'),
			'noStatus' => array('type' => 'flag', 'name' => '-n'),
			'copies'   => array('type' => 'flag', 'name' => '-C'),
			'subrepos' => array('type' => 'flag', 'name' => '-S')
		));
	}

	public function getCommandName() {
		return 'status';
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = $reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $reader->readReturnValue();

		return libhg_Command_Status_Result::parseOutput($output, $this);
	}
}
