<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Branches_Cmd extends libhg_Command_Base {
	protected $active = false;
	protected $closed = false;

	public function active($flag = true) { $this->active = $flag; return $this; }
	public function closed($flag = true) { $this->closed = $flag; return $this; }

	public function getCommandName() { return 'branches';    }
	public function getActive()      { return $this->active; }
	public function getClosed()      { return $this->closed; }

	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->active) $options->setFlag('-a');
		if ($this->closed) $options->setFlag('-c');

		return $options;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$branches = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$branches = empty($branches) ? array() : explode("\n", $branches);
		$code     = $reader->readReturnValue();

		return new libhg_Command_Branches_Result($branches, $code);
	}
}
