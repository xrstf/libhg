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

	const TYPE_SINGLE   = 0;
	const TYPE_MULTIPLE = 1;

	public function setRepository(libhg_Repository_Interface $repo = null) {
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
			foreach ($values[1] as $value) {
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
		$options = array_filter($this->toArray());
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
		$copy = clone $this;

		foreach ($options->getFlags() as $flag) {
			$copy->setFlag($flag);
		}

		foreach ($options->options as $name => $option) {
			list ($type, $values) = $option;

			if ($type === self::TYPE_SINGLE) {
				$copy->options[$name] = $option;
			}
			else {
				$copyValue = (array) $copy->getMultiple($name);
				$merged    = array_merge($copyValue, $values);

				$copy->options[$name] = array(self::TYPE_MULTIPLE, $merged);
			}
		}

		$otherArguments = $options->getArguments();

		if (!empty($otherArguments)) {
			$copy->args = $otherArguments;
		}

		$copy->repo = $options->repo;
		return $copy;
	}

	public function getArguments() { return $this->args;  }
	public function getFlags()     { return $this->flags; }

	public function getOptions() {
		$retval = array();

		foreach ($this->options as $name => $option) {
			$retval[$name] = $option[1];
		}

		return $retval;
	}

	public function getSingle($name)   { return isset($this->options[$name])  ? reset($this->options[$name][1]) : null; }
	public function getMultiple($name) { return isset($this->options[$name])  ? $this->options[$name][1]        : null; }
	public function getFlag($name)     { return in_array($name, $this->flags) ? true                            : null; }

	public function setSingle($name, $value) {
		$this->options[$name] = array(self::TYPE_SINGLE, array($value));
		return $this;
	}

	public function setMultiple($name, array $values) {
		$this->options[$name] = array(self::TYPE_MULTIPLE, $values);
		return $this;
	}

	public function setFlag($flag) {
		$this->flags[] = $flag;
		$this->flags   = array_unique($this->flags);

		return $this;
	}
}
