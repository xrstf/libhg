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
 * Generated command class for `hg heads`
 *
 * @see     http://selenic.com/hg/help/heads
 * @package libhg.Command.Heads
 */
class libhg_Command_Heads_Cmd extends libhg_Command_Heads_Base {
	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = parent::getCommandOptions();

		// make sure we have a output format we can understand
		$options->setSingle('--style', realpath(dirname(__FILE__).'/../Log/default.style'));
		$options->setFlag('--debug'); // make hg show trivial parents (i.e. non-merge parents)

		return $options;
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Heads_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$parser = new libhg_Parser_Changeset();
		$heads  = $parser->parseOutput($reader, $repo);
		$code   = $reader->readReturnValue();

		return new libhg_Command_Heads_Result($heads, $code);
	}
}
