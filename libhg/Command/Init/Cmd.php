<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_Init_Cmd extends libhg_Command_Base {
	protected $dest      = null;
	protected $ssh       = null;
	protected $remoteCmd = null;
	protected $insecure  = false;

	public function __construct($dest = null) {
		$this->dest = $dest;
	}

	public function dest($dest)            { $this->dest      = $dest;       return $this; }
	public function ssh($sshCommand)       { $this->ssh       = $sshCommand; return $this; }
	public function remoteCmd($remoteCmd)  { $this->remoteCmd = $remoteCmd;  return $this; }
	public function insecure($flag = true) { $this->insecure  = $flag;       return $this; }

	public function getName()      { return 'init';           }
	public function getDest()      { return $this->dest;      }
	public function setSsh()       { return $this->ssh;       }
	public function getRemoteCmd() { return $this->remoteCmd; }
	public function getInsecure()  { return $this->insecure;  }

	public function getOptions() {
		$options = new libhg_Options_Container();

		if ($this->dest !== null)      $options->addArgument($this->dest);
		if ($this->ssh !== null)       $options->setSingle('-e', $this->ssh);
		if ($this->remoteCmd !== null) $options->setSingle('--remotecmd', $this->remoteCmd);
		if ($this->insecure)           $options->setFlag('--insecure');

		return $options;
	}

	public function usesNoRepositoryOption() {
		return true;
	}

	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		$output = trim($reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		$code   = $reader->readReturnValue();

		return new libhg_Command_Init_Result($output, $code);
	}
}
