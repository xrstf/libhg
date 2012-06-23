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
 * Command class for `hg branch`
 *
 * @see http://selenic.com/hg/help/branch
 */
class libhg_Command_Branch_Cmd extends libhg_Command_Branch_Base {
	public function __construct($name = null) {
		$this->name($name);
	}

	public function getCommandOptions() {
		$options = parent::getCommandOptions();
		return $options->setFlag('-q'); // ignore 'was this really what you wanted?' output
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Branch_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		$newBranch = $output;
		$options   = $this->getCommandOptions();
		$args      = $options->getArguments();

		if (!empty($args)) {
			$newBranch = reset($args);
		}

		return new libhg_Command_Branch_Result($newBranch, $code);
	}
}
