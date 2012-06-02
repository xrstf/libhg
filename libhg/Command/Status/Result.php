<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Status_Result {
	public $files;

	const STATUS_MODIFIED = 'M';
	const STATUS_ADDED    = 'A';
	const STATUS_REMOVED  = 'R';
	const STATUS_DELETED  = '!';
	const STATUS_CLEAN    = 'C';
	const STATUS_UNKNOWN  = '?';
	const STATUS_IGNORED  = 'I';

	public function __construct(array $files) {
		$this->files = $files;
	}

	public static function parseOutput($output, libhg_Command_Status_Cmd $cmd) {
		$files  = array_filter(explode("\n", $output));
		$result = array();

		if (!$cmd->getNoStatus()) {
			foreach ($files as $line) {
				$line  = str_replace('\\', '/', $line);
				$parts = explode(' ', $line, 2);

				$result[$parts[1]] = $parts[0];
			}
		}
		else {
			foreach ($files as $file) {
				$file = str_replace('\\', '/', $file);
				$result[$file] = self::STATUS_UNKNOWN;
			}
		}

		return new self($result);
	}
}
