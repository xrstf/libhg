<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Archive_Cmd extends libhg_Command_Archive_Base {
	public function __construct($destination, $type = null) {
		$this->dest($destination);
		$this->type($type);
	}

	/**
	 * set type
	 *
	 * @param  string $type               the single type argument
	 * @return libhg_Command_Archive_Cmd  self
	 */
	public function type($type) {
		if ($type !== null && !in_array($type, array('files', 'tar', 'tbz2', 'tgz', 'uzip', 'zip'))) {
			throw new libhg_Exception('Invalid type "'.$type.'" given.');
		}

		$this->type = $type;
		return $this;
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Archive_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code = $reader->readReturnValue();

		return new libhg_Command_Archive_Result($code);
	}
}
