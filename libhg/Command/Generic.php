<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

abstract class libhg_Command_Generic extends libhg_Command_Base {
	protected $options;

	public function __construct() {
		$this->options = $this->getOptionDefinition();
	}

	abstract protected function getOptionDefinition();

	public function __call($method, array $arguments) {
		// getAddremove => return ...
		if (substr($method, 0, 3) === 'get') {
			$option = lcfirst(substr($method, 3));
			$option = $this->resolveAlias($option);

			if (isset($this->options[$option])) {
				if (!array_key_exists('value', $this->options[$option])) {
					$this->options[$option]['value'] = $this->getDefaultValueByType($this->options[$option]['type']);
				}

				return $this->options[$option]['value'];
			}

			throw new libhg_Exception('Option "'.$option.'" is not defined for '.get_class($this).' instances.');
		}

		// resetFiles => $this->files = array(); return ...
		if (substr($method, 0, 5) === 'reset' && strlen($method) > 5) {
			$option = lcfirst(substr($method, 5));
			$option = $this->resolveAlias($option);

			if (isset($this->options[$option])) {
				$this->options[$option]['value'] = $this->getDefaultValueByType($this->options[$option]['type']);
				return $this;
			}

			throw new libhg_Exception('Option "'.$option.'" is not defined for '.get_class($this).' instances.');
		}

		// setter mode
		$option = $method;
		$option = $this->resolveAlias($option);
		$value  = isset($arguments[0]) ? $arguments[0] : null;

		if (isset($this->options[$option])) {
			$this->options[$option] = $this->setValue($this->options[$option], $value, !isset($arguments[0]));
			return $this;
		}

		throw new libhg_Exception('Option "'.$option.'" is not defined for '.get_class($this).' instances.');
	}

	private function resolveAlias($option) {
		if (isset($this->options[$option]['alias'])) {
			return $this->resolveAlias($this->options[$option]['alias']);
		}

		return $option;
	}

	private function getDefaultValueByType($type) {
		switch ($type) {
			case 'flag':       return false;
			case 'single-arg': return null;
			case 'single-opt': return null;
			case 'multi-arg':  return array();
			case 'multi-opt':  return array();
			default:         throw new libhg_Exception('Unknown option type "'.$type.'" given.');
		}
	}

	private function setValue(array $option, $value, $valueIsDefault) {
		$optionValue = array_key_exists('value', $option) ? $option['value'] : $this->getDefaultValueByType($option['type']);

		switch ($option['type']) {
			case 'flag':
				$optionValue = $valueIsDefault ? true : ((boolean) $value);
				break;

			case 'single-arg':
			case 'single-opt':
				$optionValue = $value;
				break;

			case 'multi-arg':
			case 'multi-opt':
				foreach ((array) $value as $v) $optionValue[] = $v;
				break;

			default:
				throw new libhg_Exception('Unknown option type "'.$type.'" given.');
		}

		$option['value'] = $optionValue;
		return $option;
	}

	private function inferCliName($name) {
		$name = preg_replace('/([A-Z])/', '-$1', $name);
		return '--'.strtolower($name);
	}

	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		foreach ($this->options as $name => $data) {
			$value   = array_key_exists('value', $data) ? $data['value'] : null;
			$type    = $data['type'];
			$cliName = isset($data['name']) ? $data['name'] : $this->inferCliName($name);

			switch ($type) {
				case 'flag':
					if ($value) $options->setFlag($cliName);
					break;

				case 'single-arg':
					if ($value !== null) $options->addArgument($value);
					break;

				case 'single-opt':
					if ($value !== null) $options->setSingle($cliName, $value);
					break;

				case 'multi-arg':
					foreach ((array) $value as $arg) {
						$options->addArgument($arg);
					}
					break;

				case 'multi-opt':
					if ($value !== null) $options->setMultiple($cliName, $value);
					break;

				default:
					throw new libhg_Exception('Unknown option type "'.$type.'" given.');
			}
		}

		return $options;
	}

	protected function appendInclExclOptions(array $options) {
		$options['include'] = array('type' => 'multi-opt', 'name' => '-I', 'alias' => 'incl');
		$options['exclude'] = array('type' => 'multi-opt', 'name' => '-X', 'alias' => 'excl');

		return $options;
	}

	protected function appendCommunicationOptions(array $options) {
		$options['ssh']       = array('type' => 'single-opt', 'name' => '-e');
		$options['remoteCmd'] = array('type' => 'single-opt', 'name' => '--remotecmd');
		$options['insecure']  = array('type' => 'flag');

		return $options;
	}
}
