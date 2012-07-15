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
 * Parser for a changegroup output
 *
 * @package libhg.Parser
 */
class libhg_Parser_Changegroup {
	public function parseOutput(libhg_Stream_Readable $reader, libhg_Repository $repo) {
		$changesets = array();

		while ($chunk = $reader->readUntil("\n\n")) {
			$changeset = explode("\n", trim($chunk));
			$tags      = array();
			$parents   = array();
			$modified  = null;
			$added     = null;
			$deleted   = null;

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

		return $changesets;
	}
}
