<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Add_Cmd extends libhg_Command_Base {
	protected $files    = array();
	protected $includes = array();
	protected $excludes = array();
	protected $subrepos = false;
	protected $dryRun   = false;

	public function subrepos($flag = true) { $this->subrepos   = $flag; return $this; }
	public function dryRun($flag = true)   { $this->dryRun     = $flag; return $this; }
	public function file($file)            { $this->files[]    = $file; return $this; }
	public function incl($ptrn)            { $this->includes[] = $ptrn; return $this; }
	public function excl($ptrn)            { $this->excludes[] = $ptrn; return $this; }

	public function resetFiles() {
		$this->files = array();
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

	public function getSubrepos() { return $this->subrepos; }
	public function getDryRun()   { return $this->dryRun;   }
	public function getFiles()    { return $this->files;    }
	public function getIncludes() { return $this->includes; }
	public function getExcludes() { return $this->excludes; }

	public function getCommandName() {
		return 'add';
	}

	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->subrepos) $options->setFlag('-S');
		if ($this->dryRun)   $options->setFlag('-n');

		foreach ($this->files as $file) {
			$options->addArgument($file);
		}

		if ($this->includes) { $options->setMultiple('-I', $this->includes); }
		if ($this->excludes) { $options->setMultiple('-X', $this->excludes); }

		return $options;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$files = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$files = empty($files) ? array() : explode("\n", $files);
		$code  = $reader->readReturnValue();

		return new libhg_Command_Add_Result($files, $code);
	}
}
