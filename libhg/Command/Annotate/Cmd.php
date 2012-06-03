<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Annotate_Cmd extends libhg_Command_Base {
	protected $files             = array();
	protected $revs              = array();
	protected $noFollow          = false;
	protected $text              = false;
	protected $user              = false;
	protected $file              = false;
	protected $date              = false;
	protected $dateShort         = false;
	protected $number            = true;
	protected $changeset         = false;
	protected $lineNumber        = false;
	protected $ignoreAllSpace    = false;
	protected $ignoreSpaceChange = false;
	protected $ignoreblankLines  = false;
	protected $includes          = array();
	protected $excludes          = array();

	public function __construct($initialFile) {
		if (is_array($initialFile)) {
			$this->files = $initialFile;
		}
		else {
			$this->files = array($initialFile);
		}
	}

	public function file($file)                     { $this->files[]           = $file; return $this; }
	public function rev($rev)                       { $this->revs[]            = $rev;  return $this; }
	public function noFollow($flag = true)          { $this->noFollow          = $flag; return $this; }
	public function text($flag = true)              { $this->text              = $flag; return $this; }
	public function user($flag = true)              { $this->user              = $flag; return $this; }
	public function filename($flag = true)          { $this->file              = $flag; return $this; }
	public function date($flag = true)              { $this->date              = $flag; return $this; }
	public function dateShort($flag = true)         { $this->dateShort         = $flag; return $this; }
	public function number($flag = true)            { $this->number            = $flag; return $this; }
	public function changeset($flag = true)         { $this->changeset         = $flag; return $this; }
	public function lineNumber($flag = true)        { $this->lineNumber        = $flag; return $this; }
	public function ignoreAllSpace($flag = true)    { $this->ignoreAllSpace    = $flag; return $this; }
	public function ignoreSpaceChange($flag = true) { $this->ignoreSpaceChange = $flag; return $this; }
	public function ignoreblankLines($flag = true)  { $this->ignoreblankLines  = $flag; return $this; }
	public function incl($ptrn)                     { $this->includes[]        = $ptrn; return $this; }
	public function excl($ptrn)                     { $this->excludes[]        = $ptrn; return $this; }

	public function resetFiles() {
		$this->files = array();
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

	public function getFiles()             { return $this->files;             }
	public function getRevs()              { return $this->revs;              }
	public function getNoFollow()          { return $this->noFollow;          }
	public function getText()              { return $this->text;              }
	public function getUser()              { return $this->user;              }
	public function getFilename()          { return $this->file;              }
	public function getDate()              { return $this->date;              }
	public function getDateShort()         { return $this->dateShort;         }
	public function getNumber()            { return $this->number;            }
	public function getChangeset()         { return $this->changeset;         }
	public function getLineNumber()        { return $this->lineNumber;        }
	public function getIgnoreAllSpace()    { return $this->ignoreAllSpace;    }
	public function getIgnoreSpaceChange() { return $this->ignoreSpaceChange; }
	public function getIgnoreblankLines()  { return $this->ignoreblankLines;  }
	public function getIncludes()          { return $this->includes;          }
	public function getExcludes()          { return $this->excludes;          }

	public function getCommandName() {
		return 'annotate';
	}

	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->noFollow)          $options->setFlag('--no-follow');
		if ($this->text)              $options->setFlag('-a');
		if ($this->user)              $options->setFlag('-u');
		if ($this->file)              $options->setFlag('-f');
		if ($this->date)              $options->setFlag('-d');
		if ($this->dateShort)         $options->setFlag('-q');
		if ($this->number)            $options->setFlag('-n');
		if ($this->changeset)         $options->setFlag('-c');
		if ($this->lineNumber)        $options->setFlag('-l');
		if ($this->ignoreAllSpace)    $options->setFlag('-w');
		if ($this->ignoreSpaceChange) $options->setFlag('-b');
		if ($this->ignoreblankLines)  $options->setFlag('-B');

		foreach ($this->files as $file) {
			$options->addArgument($file);
		}

		if ($this->revs)     $options->setMultiple('-r', $this->revs);
		if ($this->includes) $options->setMultiple('-I', $this->includes);
		if ($this->excludes) $options->setMultiple('-X', $this->excludes);

		return $options;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$annotation = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code       = $reader->readReturnValue();

		return new libhg_Command_Annotate_Result($annotation, $code);
	}
}
