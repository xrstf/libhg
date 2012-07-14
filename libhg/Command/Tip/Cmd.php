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
 * Generated command class for `hg tip`
 *
 * @generated
 * @see     http://selenic.com/hg/help/tip
 * @package libhg.Command.Tip
 */
class libhg_Command_Tip_Cmd extends libhg_Command_Tip_Base {
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
	 * @return libhg_Changeset
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$parser = new libhg_Parser_Changeset();
		$tips   = $parser->parseOutput($reader, $repo);
		$code   = $reader->readReturnValue();

		return $tips[0];
	}
}
