<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Branch_Cmd extends libhg_Command_Base {
	protected $files       = array();
	protected $message     = null;
	protected $logfile     = null;
	protected $date        = null;
	protected $user        = null;
	protected $addremove   = false;
	protected $closeBranch = false;
	protected $amend       = false;
	protected $subrepos    = false;
	protected $includes    = array();
	protected $excludes    = array();

	public function __construct($message = null, $isFile = false, $user = null, $files = null, $addremove = false, $closeBranch = false) {
		if ($message) {
			if ($isFile) {
				$this->logfile = $message;
			}
			else {
				$this->message = $message;
			}
		}

		$this->user        = $user;
		$this->addremove   = (boolean) $addremove;
		$this->closeBranch = (boolean) $closeBranch;

		if (is_array($files)) {
			$this->files = $files;
		}
		elseif ($files) {
			$this->files = array($files);
		}
	}

	public function message($msg)             { $this->message     = $msg;  return $this; }
	public function logfile($file)            { $this->logfile     = $file; return $this; }
	public function file($file)               { $this->files[]     = $file; return $this; }
	public function user($user)               { $this->user        = $user; return $this; }
	public function date($date)               { $this->date        = $date; return $this; }
	public function addremove($flag = true)   { $this->addremove   = $flag; return $this; }
	public function closeBranch($flag = true) { $this->closeBranch = $flag; return $this; }
	public function amend($flag = true)       { $this->amend       = $flag; return $this; }
	public function subrepos($flag = true)    { $this->subrepos    = $flag; return $this; }
	public function incl($ptrn)               { $this->includes[]  = $ptrn; return $this; }
	public function excl($ptrn)               { $this->excludes[]  = $ptrn; return $this; }

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

	public function getName()        { return 'commit';           }
	public function getFiles()       { return $this->files;       }
	public function getMessage()     { return $this->message;     }
	public function getLogfile()     { return $this->logfile;     }
	public function getUser()        { return $this->user;        }
	public function getDate()        { return $this->date;        }
	public function getAddremove()   { return $this->addremove;   }
	public function getCloseBranch() { return $this->closeBranch; }
	public function getAmend()       { return $this->amend;       }
	public function getSubrepos()    { return $this->subrepos;    }
	public function getIncludes()    { return $this->includes;    }
	public function getExcludes()    { return $this->excludes;    }

	public function getOptions() {
		$options = new libhg_Options_Container();

		if (empty($this->message)) {
			$file = $this->logfile ? realpath($this->logfile) : false;

			if ($file === false) {
				throw new libhg_Exception('No commit message given or logfile not found.');
			}
		}

		if ($this->message !== null) $options->setSingle('-m', $this->message);
		if ($this->logfile !== null) $options->setSingle('-l', $this->logfile);
		if ($this->user !== null)    $options->setSingle('-d', $this->user);
		if ($this->date !== null)    $options->setSingle('-d', $this->date);

		if ($this->addremove)   $options->setFlag('-A');
		if ($this->closeBranch) $options->setFlag('--close-branch');
		if ($this->amend)       $options->setFlag('--amend');
		if ($this->subrepos)    $options->setFlag('-S');

		foreach ($this->files as $file) {
			$options->addArgument($file);
		}

		if ($this->includes) $options->setMultiple('-I', $this->includes);
		if ($this->excludes) $options->setMultiple('-X', $this->excludes);

		return $options;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return new libhg_Command_Commit_Result($output, $code);
	}
}
