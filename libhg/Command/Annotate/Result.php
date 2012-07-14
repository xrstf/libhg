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
 * Result class for `hg annotate`
 *
 * @see     http://selenic.com/hg/help/annotate
 * @package libhg.Command.Annotate
 */
class libhg_Command_Annotate_Result extends libhg_Command_BaseResult {
	/**
	 * annotation lines
	 *
	 * @var array
	 */
	public $lines;

	/**
	 * Constructor
	 *
	 * @param string           $annotation  full command output
	 * @param libhg_Repository $repo        the repository the command was executed on
	 */
	public function __construct($annotation, libhg_Repository $repo) {
		parent::__construct(self::SUCCESS);

		$lines = explode("\n", $annotation);

		foreach ($lines as $line) {
			if (!preg_match('/^(.+?) (\d+) ([0-9a-f]+) (.+?):([ 0-9]+): (.*)$/m', $line, $match)) {
				continue; // and warn?
			}

			$lines[] = array(
				'line'      => $match[5],
				'text'      => $match[6],
				'changeset' => new libhg_Changeset($repo, $match[3], (int) $match[2], null, $match[4], $match[1]),
			);
		}

		$this->lines = $lines;
	}
}
