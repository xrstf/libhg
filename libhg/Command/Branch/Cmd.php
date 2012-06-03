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
	protected $name  = null;
	protected $force = false;
	protected $clean = false;

	public function __construct($name = null) {
		$this->name = $name;
	}

	public function name($name)         { $this->name  = $name; return $this; }
	public function force($flag = true) { $this->force = $flag; return $this; }
	public function clean($flag = true) { $this->clean = $flag; return $this; }

	public function getName()   { return 'branch';     }
	public function getBranch() { return $this->name;  }
	public function getForce()  { return $this->force; }
	public function getClean()  { return $this->clean; }

	public function getOptions() {
		$options = new libhg_Options_Container();

		if ($this->name !== null) $options->addArgument($this->name);
		if ($this->force)         $options->setFlag('-f');
		if ($this->clean)         $options->setFlag('-C');

		return $options;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return new libhg_Command_Branch_Result($output, $code);
	}
}
