<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Hello_Cmd implements libhg_Command_Interface {
	public function __toString() {
		return '(hello)';
	}

	public function run(libhg_Client_Interface $client) {
		$input = $client->getReadableStream();
		$input->expectChannels(array(libhg_Stream::CHANNEL_OUTPUT));

		$size         = $input->readInt();
		$hello        = explode("\n", $input->read($size));
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
