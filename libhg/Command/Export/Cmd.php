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
 * Command class for `hg export`
 *
 * @see     http://selenic.com/hg/help/export
 * @package libhg.Command.Export
 */
class libhg_Command_Export_Cmd extends libhg_Command_Export_Base {
	public function toPatch($patchNameFormat) {
		if (!preg_match('/\.patch$/', $patchNameFormat)) {
			$patchNameFormat .= '.patch';
		}

		return $this->output($patchNameFormat)->git();
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Export_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$text = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code = $reader->readReturnValue();

		// output was redirected into a file
		if ($this->output !== null) {
			return new libhg_Command_Export_Result($this->output, true, $code);
		}

		return new libhg_Command_Export_Result($text, false, $code);
	}
}
