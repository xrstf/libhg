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
 * Base class for most commands
 *
 * @package libhg.Command
 */
abstract class libhg_Command_Base implements libhg_Command_Interface {
	protected $client;

	public function setClient(libhg_Client_Interface $client = null) {
		$this->client = $client;
		return $this;
	}

	public function usesNoRepositoryOption() {
		return false;
	}

	public function exec() {
		if ($this->client === null) {
			throw new libhg_Exception('exec() needs to have a client set prior via setClient().');
		}

		return $this->client->run($this);
	}

	public function __toString() {
		$name    = $this->getCommandName();
		$options = (string) $this->getCommandOptions();

		return rtrim($name.' '.$options);
	}
}
