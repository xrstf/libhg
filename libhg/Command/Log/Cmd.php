<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Log_Cmd extends libhg_Command_Base {
	protected $file     = null;
	protected $follow   = false;
	protected $date     = null;
	protected $copies   = false;
	protected $keywords = array();
	protected $revs     = array();
	protected $removed  = true;
	protected $users    = array();
	protected $branches = array();
	protected $prunes   = array();
	protected $limit    = null;
	protected $noMerges = false;
//	protected $stat     = false;
	protected $includes = array();
	protected $excludes = array();

	public function file($file)            { $this->file       = $file;   return $this; }
	public function follow($flag = true)   { $this->follow     = $flag;   return $this; }
	public function date($date)            { $this->date       = $date;   return $this; }
	public function copies($flag = true)   { $this->copies     = $flag;   return $this; }
	public function keyword($text)         { $this->keywords[] = $text;   return $this; }
	public function rev($rev)              { $this->revs[]     = $rev;    return $this; }
	public function removed($flag = true)  { $this->removed    = $flag;   return $this; }
	public function user($user)            { $this->users[]    = $user;   return $this; }
	public function branch($branch)        { $this->branches[] = $branch; return $this; }
	public function prune($rev)            { $this->prunes[]   = $rev;    return $this; }
	public function limit($limit)          { $this->limit      = $limit;  return $this; }
	public function noMerges($flag = true) { $this->noMerges   = $flag;   return $this; }
	public function incl($ptrn)            { $this->includes[] = $ptrn;   return $this; }
	public function excl($ptrn)            { $this->excludes[] = $ptrn;   return $this; }

	public function resetKeywords() {
		$this->keywords = array();
		return $this;
	}

	public function resetUsers() {
		$this->users = array();
		return $this;
	}

	public function resetBranches() {
		$this->branches = array();
		return $this;
	}

	public function resetPrunes() {
		$this->prunes = array();
		return $this;
	}

	public function resetRevs() {
		$this->revs = array();
		return $this;
	}

	public function resetIncludes() {
		$this->includes = array();
		return $this;
	}

	public function resetExcludes() {
		$this->excludes = array();
		return $this;
	}

	public function getFile()     { return $this->file;     }
	public function getFollow()   { return $this->follow;   }
	public function getDate()     { return $this->date;     }
	public function getCopies()   { return $this->copies;   }
	public function getKeywords() { return $this->keywords; }
	public function getRevs()     { return $this->revs;     }
	public function getRemoved()  { return $this->removed;  }
	public function getUsers()    { return $this->users;    }
	public function getBranches() { return $this->branches; }
	public function getPrunes()   { return $this->prunes;   }
	public function getLimit()    { return $this->limit;    }
	public function getNoMerges() { return $this->noMerges; }
	public function getIncludes() { return $this->includes; }
	public function getExcludes() { return $this->excludes; }

	public function getCommandName() {
		return 'log';
	}

	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->file)     $options->addArgument($this->file);
		if ($this->follow)   $options->setFlag('-f');
		if ($this->copies)   $options->setFlag('-C');
		if ($this->removed)  $options->setFlag('--removed');
		if ($this->noMerges) $options->setFlag('-M');

		if ($this->date)  { $options->setSingle('-d', $this->date);  }
		if ($this->limit) { $options->setSingle('-l', $this->limit); }

		if ($this->keywords) { $options->setMultiple('-k', $this->keywords); }
		if ($this->revs)     { $options->setMultiple('--rev', $this->revs);  }
		if ($this->users)    { $options->setMultiple('-u', $this->users);    }
		if ($this->branches) { $options->setMultiple('-b', $this->branches); }
		if ($this->prunes)   { $options->setMultiple('-P', $this->prunes);   }
		if ($this->includes) { $options->setMultiple('-I', $this->includes); }
		if ($this->excludes) { $options->setMultiple('-X', $this->excludes); }

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
