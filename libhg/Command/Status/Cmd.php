<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Status_Cmd extends libhg_Command_Base {
	protected $all      = false;
	protected $modified = true;
	protected $added    = true;
	protected $removed  = true;
	protected $deleted  = true;
	protected $clean    = false;
	protected $unknown  = true;
	protected $ignored  = false;
	protected $noStatus = false;
	protected $copies   = false;
	protected $subrepos = false;
	protected $change   = null;
	protected $revs     = array();
	protected $includes = array();
	protected $excludes = array();

	public function all($flag = true)      { $this->all        = $flag; return $this; }
	public function modified($flag = true) { $this->modified   = $flag; return $this; }
	public function added($flag = true)    { $this->added      = $flag; return $this; }
	public function removed($flag = true)  { $this->removed    = $flag; return $this; }
	public function deleted($flag = true)  { $this->deleted    = $flag; return $this; }
	public function clean($flag = true)    { $this->clean      = $flag; return $this; }
	public function unknown($flag = true)  { $this->unknown    = $flag; return $this; }
	public function ignored($flag = true)  { $this->ignored    = $flag; return $this; }
	public function noStatus($flag = true) { $this->noStatus   = $flag; return $this; }
	public function copies($flag = true)   { $this->copies     = $flag; return $this; }
	public function subrepos($flag = true) { $this->subrepos   = $flag; return $this; }
	public function change($rev)           { $this->change     = $rev;  return $this; }
	public function rev($rev)              { $this->revs[]     = $rev;  return $this; }
	public function incl($ptrn)            { $this->includes[] = $ptrn; return $this; }
	public function excl($ptrn)            { $this->excludes[] = $ptrn; return $this; }

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

	public function getAll()      { return $this->all;      }
	public function getModified() { return $this->modified; }
	public function getAdded()    { return $this->added;    }
	public function getRemoved()  { return $this->removed;  }
	public function getDeleted()  { return $this->deleted;  }
	public function getClean()    { return $this->clean;    }
	public function getUnknown()  { return $this->unknown;  }
	public function getIgnored()  { return $this->ignored;  }
	public function getNoStatus() { return $this->noStatus; }
	public function getCopies()   { return $this->copies;   }
	public function getSubrepos() { return $this->subrepos; }
	public function getChange()   { return $this->change;   }
	public function getRevs()     { return $this->revs;     }
	public function getIncludes() { return $this->includes; }
	public function getExcludes() { return $this->excludes; }

	public function getName() {
		return 'status';
	}

	public function getOptions() {
		$options = new libhg_Options_Container();

		if ($this->all)      $options->setFlag('-A');
		if ($this->modified) $options->setFlag('-m');
		if ($this->added)    $options->setFlag('-a');
		if ($this->removed)  $options->setFlag('-r');
		if ($this->deleted)  $options->setFlag('-d');
		if ($this->clean)    $options->setFlag('-c');
		if ($this->unknown)  $options->setFlag('-u');
		if ($this->ignored)  $options->setFlag('-i');
		if ($this->noStatus) $options->setFlag('-n');
		if ($this->copies)   $options->setFlag('-C');
		if ($this->subrepos) $options->setFlag('-S');

		if ($this->change) {
			$options->setSingle('--change', $this->change);
		}

		if ($this->revs) {
			$options->setMultiple('--rev', $this->revs);
		}

		if ($this->includes) {
			$options->setMultiple('-I', $this->includes);
		}

		if ($this->excludes) {
			$options->setMultiple('-X', $this->excludes);
		}

		return $options;
	}

	public function run(libhg_Client_Interface $client) {
		$options = $this->getOptions();

		$client->runCommand('status', $options);

		$stream = $client->getReadableStream();
		$output = $stream->readString(libhg_Stream::CHANNEL_OUTPUT);
		$code   = $stream->readReturnValue();

		return libhg_Command_Status_Result::parseOutput($output, $this);
	}
}
