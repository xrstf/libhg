<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

interface libhg_Client_Interface {
	/**
	 * connect
	 *
	 * This spawns a new hg instance and connects to its STDIN/STDOUT.
	 *
	 * @return libhg_Client_Interface  self
	 */
	public function connect();

	/**
	 * Close connection
	 *
	 * @return boolean
	 */
	public function close();

	/**
	 * check is a connection is established
	 *
	 * @return boolean
	 */
	public function isConnected();

	/**
	 * get capabilities
	 *
	 * @return array
	 */
	public function getCapabilities();

	/**
	 * get options
	 *
	 * @return libhg_Options_Interface
	 */
	public function getOptions();

	/**
	 * get repository
	 *
	 * @return libhg_Repository_Interface
	 */
	public function getRepository();

	/**
	 * set repository
	 *
	 * @param  libhg_Repository_Interface $repo
	 * @return libhg_Client_Interface            self
	 */
	public function setRepository(libhg_Repository_Interface $repository);

	/**
	 * get writable stream
	 *
	 * @return libhg_Stream_Writable
	 */
	public function getWritableStream();

	/**
	 * get readable stream
	 *
	 * @return libhg_Stream_Readable
	 */
	public function getReadableStream();

	/**
	 * Run a command
	 *
	 * @param  libhg_Command_Interface    $command    the command to run
	 * @param  libhg_Repository_Interface $repository explicit repository (otherwise the internally set repository is used)
	 * @return mixed                                  the command's return value
	 */
	public function run(libhg_Command_Interface $command, libhg_Repository_Interface $repository = null);
}
