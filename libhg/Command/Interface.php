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
 * Command interface
 *
 * @package libhg.Command
 */
interface libhg_Command_Interface {
	/**
	 * to string
	 *
	 * @return string  printable representation of the command including options, flags and arguments
	 */
	public function __toString();

	/**
	 * get command name
	 *
	 * @return string
	 */
	public function getCommandName();

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions();

	/**
	 * check if command has no --repository option
	 *
	 * @return boolean  if true, no --repository option will be included in the runcommand call
	 */
	public function usesNoRepositoryOption();

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return mixed                               it's recommended to return some kind of result object, containing the parsed output
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo);
}
