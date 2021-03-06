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
 * Dummy command for reading the server's hello message
 *
 * This command cannot be used in userland code and is only for internal usage.
 *
 * @package libhg.Command.Hello
 */
class libhg_Command_Hello_Cmd implements libhg_Command_Interface {
	public function __toString() {
		return '(hello)';
	}

	public function getCommandName() {
		throw new libhg_Exception('The hello command does not have a name and can only read the server\'s hello message.');
	}

	public function getCommandOptions() {
		return new libhg_Options_Container();
	}

	public function usesNoRepositoryOption() {
		return true;
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Hello_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$reader->expectChannels(array(libhg_Stream::CHANNEL_OUTPUT));

		$size         = $reader->readInt();
		$hello        = explode("\n", $reader->read($size));
		$encoding     = null;
		$capabilities = array();

		foreach ($hello as $line) {
			$parts = explode(':', $line, 2);

			if (count($parts) !== 2) {
				throw new libhg_Exception('Invalid line "'.$line.'" read.');
			}

			$key   = $parts[0];
			$value = trim($parts[1]);

			if ($key === 'capabilities') {
				$capabilities = explode(' ', $value);
			}
			elseif ($key === 'encoding') {
				$encoding = strtoupper($value);
			}
		}

		return new libhg_Command_Hello_Result($encoding, $capabilities);
	}
}
