<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Log_Cmd extends libhg_Command_Generic {
	protected function getOptionDefinition() {
		return $this->appendInclExclOptions(array(
			'file' => array('type' => 'single-arg'),

			'keywords' => array('type' => 'multi-opt', 'name' => '-k',    'alias' => 'keyword'),
			'revs'     => array('type' => 'multi-opt', 'name' => '--rev', 'alias' => 'rev'),
			'users'    => array('type' => 'multi-opt', 'name' => '-u',    'alias' => 'user'),
			'branches' => array('type' => 'multi-opt', 'name' => '-b',    'alias' => 'branch'),
			'prunes'   => array('type' => 'multi-opt', 'name' => '-P',    'alias' => 'prune'),

			'date'  => array('type' => 'single-opt', 'name' => '-d'),
			'limit' => array('type' => 'single-opt', 'name' => '-l'),

			'follow'   => array('type' => 'flag', 'name' => '-f'),
			'copies'   => array('type' => 'flag', 'name' => '-C'),
			'removed'  => array('type' => 'flag'),
			'noMerges' => array('type' => 'flag', 'name' => '-M')
		));
	}

	public function getCommandName() {
		return 'log';
	}

	public function getCommandOptions() {
		$options = parent::getCommandOptions();

		// make sure we have a output format we can understand
		$options->setSingle('--style', realpath(dirname(__FILE__).'/default.style'));
		$options->setFlag('--debug'); // make hg show trivial parents (i.e. non-merge parents)

		return $options;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$changesets = array();

		while ($chunk = $reader->readUntil("\n\n")) {
			$changeset = explode("\n", trim($chunk));
			$tags      = array();
			$parents   = array();
			$modified  = array();
			$added     = array();
			$deleted   = array();

			$rev = $node = $date = $author = $desc = $branch = '';

			foreach ($changeset as $row) {
				list($key, $value) = explode(':', $row, 2);
				$key = strtolower($key);

				switch ($key) {
					case 'desc':
						$desc = urldecode($value);
						break;

					case 'rev':
					case 'node':
					case 'date':
					case 'author':
					case 'branch':
						$$key = $value;
						break;

					case 'parent':
						if (!preg_match('#^0+$#', $value)) {
							$parents[] = $value;
						}

						break;

					case 'tag':  $tags[]     = $value; break;
					case 'file': $modified[] = $value; break;
					case 'add':  $added[]    = $value; break;
					case 'del':  $deleted[]  = $value; break;
				}
			}

			$changesets[] = new libhg_Changeset($repo, $node, $rev, $parents, $date, $author, $desc, $branch, $tags, $modified, $added, $deleted);
		}

		$code = $reader->readReturnValue();

		return new libhg_Command_Log_Result($changesets, $code);
	}
}
