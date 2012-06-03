<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Options_Container implements libhg_Options_Interface {
	protected $args    = array();
	protected $options = array();
	protected $flags   = array();
	protected $repo    = null;

	public function setRepository(libhg_Repository $repo) {
		$this->repo = $repo;
	}

	public function getRepository() {
		return $this->repo;
	}

	public function toArray() {
		$result = array();
		$chars  = '';

		if ($this->repo) {
			$result[] = '-R';
			$result[] = $this->repo->getDirectory();
		}

		foreach ($this->flags as $flag) {
			if (strlen($flag) === 2 && $flag[0] === '-') {
				$chars .= $flag[1];
			}
			else {
				$result[] = $flag;
			}
		}

		if (!empty($chars)) {
			$result[] = '-'.$chars;
		}

		foreach ($this->options as $name => $values) {
			foreach ($values as $value) {
				$result[] = $name;
				$result[] = $value;
			}
		}

		foreach ($this->args as $arg) {
			$result[] = $arg;
		}

		return $result;
	}

	public function __toString() {
		$options = $this->toArray();
		return implode(' ', $options);
	}

	public function reset() {
		$this->args    = array();
		$this->options = array();
		$this->flags   = array();
		$this->repo    = null;
	}

	public function addArgument($arg) {
		$this->args[] = $arg;
		return $this;
	}

	public function merge(libhg_Options_Interface $options) {
		foreach ($options->getFlags() as $flag) {
			$this->setFlag($flag);
		}

		foreach ($options->getOptions() as $name => $values) {
			$merged = array_merge((array) $this->getMultiple($name), $values);
			$this->options[$name] = $merged;
		}

		$otherArguments = $options->getArguments();

		if (!empty($otherArguments)) {
			$this->args = $otherArguments;
		}

		$this->repo = $options->repo;
		return $this;
	}

	public function getArguments() { return $this->args;    }
	public function getOptions()   { return $this->options; }
	public function getFlags()     { return $this->flags;   }

	public function getSingle($name)   { return isset($this->options[$name]) ? reset($this->options[$name]) : null; }
	public function getMultiple($name) { return isset($this->options[$name]) ? $this->options[$name]        : null; }
	public function getFlag($name)     { return isset($this->flags[$name])   ? $this->flags[$name]          : null; }

	public function setSingle($name, $value) {
		$this->options[$name] = array($value);
		return $this;
	}

	public function setMultiple($name, array $values) {
		$this->options[$name] = $values;
		return $this;
	}

	public function setFlag($flag) {
		$this->flags[] = $flag;
		$this->flags   = array_unique($this->flags);

		return $this;
	}
}
