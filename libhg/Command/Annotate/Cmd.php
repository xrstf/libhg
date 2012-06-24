<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

/**
 * Command class for `hg annotate`
 *
 * @see     http://selenic.com/hg/help/annotate
 * @package libhg.Command.Annotate
 */
class libhg_Command_Annotate_Cmd extends libhg_Command_Annotate_Base {
	public function __construct($initialFile) {
		$this->files((array) $initialFile);
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Annotate_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Annotate_Result($annotation, $code);
	}
}
