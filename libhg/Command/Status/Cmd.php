<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Status_Cmd extends libhg_Command_Status_Base {
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = $reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $reader->readReturnValue();

		return libhg_Command_Status_Result::parseOutput($output, $this);
	}
}
