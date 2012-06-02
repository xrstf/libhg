<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Summary_Cmd implements libhg_Command_Interface {
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

	public function __toString() {
		return 'summary'.($this->remote ? ' --remote' : '');
	}

	public function run(libhg_Client_Interface $client) {
		$stream  = $client->getReadableStream();
		$options = new libhg_Options_Container();

		if ($this->remote) {
			$options->setFlag('--remote');
		}

		$client->runCommand('summary', $options);

		$output = array();
		$code   = null;

		while ($stream->hasOutput()) {
			$size     = $stream->readInt();
			$output[] = $stream->read($size);
		}

		if ($stream->getChannel() === libhg_Stream::CHANNEL_RESULT) {
			$size = $stream->readInt();
			$code = $stream->readInt();
		}

		return new libhg_Command_Summary_Result($output, $code);
	}
}
