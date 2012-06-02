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

	public function getName() {
		return 'log';
	}

	public function getOptions() {
		$options = new libhg_Options_Container();

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

		return $options;
	}

	public function run(libhg_Client_Interface $client) {
		$options = $this->getOptions();

		$client->runCommand('log', $options);

		$stream = $client->getReadableStream();
		$output = $stream->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $stream->readReturnValue();

		return libhg_Command_Log_Result::parseOutput($output, $this);
	}
}
