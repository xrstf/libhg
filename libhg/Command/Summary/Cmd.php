<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Summary_Cmd extends libhg_Command_Base {
	protected $remote;

	public function __construct($remote = false) {
		$this->setRemote($remote);
	}

	public function setRemote($remote) {
		$this->remote = (boolean) $remote;
	}

	public function getRemote() {
		return $this->remote;
	}

	public function getName() {
		return 'summary';
	}

	public function getOptions() {
		$options = new libhg_Options_Container();

		if ($this->remote) {
			$options->setFlag('--remote');
		}

		return $options;
	}

	public function run(libhg_Client_Interface $client) {
		$options = $this->getOptions();

		$client->runCommand('summary', $options);

		$stream = $client->getReadableStream();
		$output = $stream->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $stream->readReturnValue();

		return new libhg_Command_Summary_Result($output, $code);
	}
}
