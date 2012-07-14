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
 * Generated command class for `hg convert`
 *
 * @see     http://selenic.com/hg/help/convert
 * @package libhg.Command.Convert
 */
class libhg_Command_Convert_Cmd extends libhg_Command_Convert_Base {
	/**
	 * check if a string looks like a literal mapping and not a filename
	 *
	 * @param  string $map  the map or a filename
	 * @return boolean      true if it looks like a map, false if it looks like a filename
	 */
	protected function mapIsString($map) {
		// newlines, guaranteed maps
		if (strpos($map, "\n") !== false) return true;
		if (strpos($map, "\r") !== false) return true;

		// file exists, guaranteed filename
		if (file_exists($map)) return false;

		// default: filename (as the CLI parameter expects a filename)
		return false;
	}

	/**
	 * create and write to a temporary file
	 *
	 * @param  string $content  file content
	 * @return string           the full path to the created file
	 */
	protected function createTempFile($content) {
		$tmpFile = tempnam(sys_get_temp_dir(), 'libhgmap');

		if (!@file_put_contents($tmpFile, $content)) {
			throw new libhg_Exception('Cannot write to temporary file '.$tmpFile.'!');
		}

		return $tmpFile;
	}

	/**
	 * transform a literal map into a file
	 *
	 * @param  string $map  map, filename or null
	 * @return mixed        null if $map was null, else a filename as a string
	 */
	protected function ensureMapfile($map) {
		if (is_string($map) && !empty($map) && $this->mapIsString($map)) {
			$map = $this->createTempFile($map);
		}

		return $map;
	}

	/**
	 * get command options
	 *
	 * If any mapping is given as a literal map, this will write those maps into
	 * temporary files before returning the options. The temporary filenames
	 * replace the originally given maps. This also means that the temporary
	 * files are being re-used on subsequent evaluate() calls.
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		// we need an explicit target in order to properly return a repo instance
		if ($this->dest === null) {
			throw new libghg_Exception('You have to specify a destination.');
		}

		// ensure we have filenames
		$this->authormap = $this->ensureMapfile($this->authormap);
		$this->filemap   = $this->ensureMapfile($this->filemap);
		$this->splicemap = $this->ensureMapfile($this->splicemap);
		$this->branchmap = $this->ensureMapfile($this->branchmap);

		// don't show the progress log
		return parent::getCommandOptions()->setFlag('-q');
	}

	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      $reader  readable stream
	 * @param  libhg_Stream_Writable      $writer  writable stream
	 * @param  libhg_Repository_Interface $repo    used repository
	 * @return libhg_Command_Convert_Result
	 */
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo) {
		// ignore actual output
		$reader->readString(libhg_Stream::CHANNEL_OUTPUT);
		$reader->readReturnValue();

		try {
			$dest = new libhg_Repository($this->dest, $repo->getClient());
		}
		catch (libhg_Exception $e) {
			$dest = null;
		}

		return new libhg_Command_Convert_Result($dest);
	}
}
