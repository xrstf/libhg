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
 * Wrapper around hg config file
 *
 * @package libhg
 */
class libhg_Hgrc {
	protected $file;    ///< string
	protected $data;    ///< array
	protected $changed; ///< boolean

	/**
	 * Constructor
	 *
	 * @throws libhg_Exception  if an invalid file was set
	 * @param string $file      full path to a hgrc-style file or null
	 */
	public function __construct($file) {
		$this->file    = null;
		$this->data    = null;
		$this->changed = false;

		if ($file !== null) {
			$this->setFile($file);
		}
	}

	/**
	 * read file content
	 *
	 * This will overwrite any changes that might have happened to this object.
	 *
	 * @throws libhg_Exception         if an invalid line was found
	 * @param  string $plain           configuration as a plain, one element per row output
	 * @param  string $defaultSection  section name for elements without a section
	 * @return libhg_Hgrc
	 */
	public static function parsePlainOutput($plain, $defaultSection) {
		$data  = array();
		$lines = explode("\n", trim($plain));
		$lines = array_filter($lines);

		foreach ($lines as $idx => $line) {
			$parts = explode('=', $line, 2);

			if (count($parts) !== 2) {
				throw new libhg_Exception('Line '.($idx+1).' does not contain a "=" character.');
			}

			$identifier = trim($parts[0]);
			$value      = trim($parts[1]);

			if (strpos($identifier, '.') === false) {
				$section = $defaultSection;
				$key     = $identifier;
			}
			else {
				$parts   = explode('.', $identifier, 2);
				$section = $parts[0];
				$key     = $parts[1];
			}

			$data[$section][$key] = $value;
		}

		$instance = new self(null);
		$instance->data = $data;

		return $instance;
	}

	/**
	 * get filename
	 *
	 * @return string  filename including path or null if not yet set
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * set file to use
	 *
	 * @param  string $file  full path to the file
	 * @return libhg_Hgrc    self
	 */
	public function setFile($file) {
		$file = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $file);

		$this->file    = rtrim($file, DIRECTORY_SEPARATOR);
		$this->changed = true;

		return $this;
	}

	/**
	 * check file existence
	 *
	 * @throws libhg_Exception  if file has not yet been set
	 * @return boolean
	 */
	public function exists() {
		if ($this->file === null) {
			throw new libhg_Exception('Cannot check file because it has not yet been set.');
		}

		return is_file($this->file);
	}

	/**
	 * read file content
	 *
	 * This will overwrite any changes that might have happened to this object.
	 *
	 * @throws libhg_Exception      if no or an invalid file was set
	 * @param  boolean $returnSelf  if true, the current instance will be returned instead of the file content
	 * @return mixed                parsed file content if $returnSelf, else self
	 */
	public function read($returnSelf = true) {
		if ($this->file === null) {
			throw new libhg_Exception('Cannot read file because it has not yet been set.');
		}

		if (!is_file($this->file)) {
			throw new libhg_Exception('Config file does not exist at "'.$this->file.'".');
		}

		if ($this->data === null || $this->changed) {
			$this->data    = parse_ini_file($this->file, true);
			$this->changed = false;
		}

		return $returnSelf ? $this : $this->data;
	}

	/**
	 * write file content
	 *
	 * @throws libhg_Exception  if no file was set or the file could not be written to
	 * @return libhg_Hgrc       self
	 */
	public function write() {
		if ($this->file === null) {
			throw new libhg_Exception('Cannot write file because it has not yet been set.');
		}

		$ini = array('; generated by libhg', '');

		if ($this->data) {
			foreach ($this->data as $section => $values) {
				if (empty($values)) continue;

				$ini[] = sprintf('[%s]', $section);

				foreach ($values as $key => $value) {
					$complex = !!preg_match('/[\'"]/', $value);

					if ($complex) {
						$ini[] = sprintf('%s = "%s"', $key, addcslashes($value, '"'));
					}
					else {
						$ini[] = sprintf('%s = %s', $key, $value);
					}
				}

				$ini[] = '';
			}
		}

		$ini  = trim(implode("\n", $ini));
		$ini .= "\n";

		if (file_put_contents($this->file, $ini) === false) {
			throw new libhg_Exception('Could not write to "'.$this->file.'".');
		}

		return $this;
	}

	/**
	 * set config value
	 *
	 * @param  string $section  section name
	 * @param  string $key      config key
	 * @param  string $value    config value
	 * @return libhg_Hgrc       self
	 */
	public function set($section, $key, $value) {
		if ($this->data === null) {
			$this->data = array();
		}

		$this->data[$section][$key] = $value;
		$this->changed              = true;

		return $this;
	}

	/**
	 * check if a section or config key exists
	 *
	 * @param  string $section  section name
	 * @param  string $key      config key
	 * @return boolean
	 */
	public function has($section, $key = null) {
		return $key === null ? isset($this->data[$section]) : isset($this->data[$section][$key]);
	}

	/**
	 * return a section or a single config key
	 *
	 * @param  string $section  section name
	 * @param  string $key      config key
	 * @return mixed            null if not found, an array if $key=null, else a scalar value
	 */
	public function get($section, $key = null) {
		if (!$this->has($section, $key)) return null;
		return $key === null ? $this->data[$section] : $this->data[$section][$key];
	}
}
