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
 * Container for options to the `hg` command
 *
 * This container can hold four kinds of data:
 *
 *   * Arguments are options that have no name. Hence their order is important.
 *   * Flags are CLI options that have no value ('--follow --colored')
 *   * Single options are options that can occur at most once per command
 *     ('-- limit 12')
 *   * Multiple options are options that can occur multiple times
 *     ('--rev 123 --rev 456 --rev 789')
 *
 * Additionally, each container can be associated with a repository. This makes
 * the container include the '--cwd' option when doing toArray().
 *
 * @package libhg.Options
 */
class libhg_Options_Container implements libhg_Options_Interface {
	protected $args    = array(); ///< array
	protected $options = array(); ///< array
	protected $flags   = array(); ///< array
	protected $repo    = null;    ///< libhg_Repository_Interface

	const TYPE_SINGLE   = 0; ///< int
	const TYPE_MULTIPLE = 1; ///< int

	/**
	 * set the repository
	 *
	 * The repository will be included in toString() and toArray() as the
	 * '--cwd' option. It can be overwritten by explicitely setting a single
	 * '--cwd' option, but this is highly discouraged.
	 *
	 * @param  libhg_Repository_Interface $repo
	 * @return libhg_Options_Container           self
	 */
	public function setRepository(libhg_Repository_Interface $repo = null) {
		$this->repo = $repo;
		return $this;
	}

	/**
	 * get repository
	 *
	 * @return libhg_Repository_Interface  the repository or null if none was set yet
	 */
	public function getRepository() {
		return $this->repo;
	}

	/**
	 * convert container to array
	 *
	 * This method will prepare the data for the command server's runcommand
	 * execution. The actual option values or arguments will not be escaped,
	 * since the result is non meant to be used on the command line. So never
	 * ever to something like <code>exec('hg '.implode(' ', $options->toArray()))</code>
	 * in your code, rather subclass this class and add proper escaping for your
	 * intended usage. Use <code>escapeshellarg()</code> if you intend to use the
	 * CLI.
	 *
	 * Multiple single-character flags ('-f', '-a') are joined together ('-fa').
	 *
	 * @return array  list of all options, flags and arguments
	 *                ([--cwd, /path/to/repo, --flag1, --flag2, --option, optionval, ...])
	 */
	public function toArray() {
		$result = array();
		$chars  = '';

		if ($this->repo) {
			$result[] = '--cwd';
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

	/**
	 * return options as string
	 *
	 * This method does nothing more than imploding <code>toArray()</code> with
	 * spaces.
	 *
	 * @return string  the options as a long string
	 *                 ('--cwd /path/to/repo --flag --flag --option val arg1 arg2')
	 */
	public function __toString() {
		$options = array_filter($this->toArray());
		return implode(' ', $options);
	}

	/**
	 * reset internal state
	 *
	 * This method resets all arguments, options, flags and the repository.
	 *
	 * @return libhg_Options_Container  self
	 */
	public function reset() {
		$this->args    = array();
		$this->options = array();
		$this->flags   = array();
		$this->repo    = null;

		return $this;
	}

	/**
	 * add argument
	 *
	 * This method adds a single argument. Be aware that the order or arguments
	 * can actually be important (most likely when you have multiple optional
	 * arguments and one mandatory argument that must follow them).
	 *
	 * @param  string $arg              the argument to add
	 * @return libhg_Options_Container  self
	 */
	public function addArgument($arg) {
		$this->args[] = $arg;
		return $this;
	}

	/**
	 * merge two option containers
	 *
	 * This method will return a *new* container, containing the merged contents
	 * of $this and $options (neither $this nor $options are changed by this).
	 *
	 * The following rules apply:
	 *
	 * Arguments are taken from $options if not empty, else the options of $this
	 * will be used. Arguments are never merged, as their cound is important.
	 *
	 * Flags are simply merged, as well as multiple options.
	 *
	 * Single options from $options will overwrite those in $this. The same
	 * applies to the repository in $options.
	 *
	 * @param  libhg_Options_Interface $options  the object to merge
	 * @return libhg_Options_Container           a new object, containing the merged content
	 */
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

	/**
	 * get arguments
	 *
	 * @return array  list of arguments
	 */
	public function getArguments() {
		return $this->args;
	}

	/**
	 * get flags
	 *
	 * @return array  flags
	 */
	public function getFlags() {
		return $this->flags;
	}

	/**
	 * get options
	 *
	 * @return array  options ({option: [value], option: [v1, v2, v3, ...]})
	 */
	public function getOptions() {
		$retval = array();

		foreach ($this->options as $name => $option) {
			$retval[$name] = $option[1];
		}

		return $retval;
	}

	/**
	 * get single option
	 *
	 * @param  string $name  option name
	 * @return string        option value or null if not set
	 */
	public function getSingle($name) {
		return isset($this->options[$name]) ? reset($this->options[$name][1]) : null;
	}

	/**
	 * get multiple option
	 *
	 * @param  string $name  option name
	 * @return array         option values or null if not set
	 */
	public function getMultiple($name) {
		return isset($this->options[$name]) ? $this->options[$name][1] : null;
	}

	/**
	 * get flag
	 *
	 * @param  string $name  flag name
	 * @return mixed         true if set, else null
	 */
	public function getFlag($name) {
		return in_array($name, $this->flags) ? true : null;
	}

	/**
	 * set single option
	 *
	 * @param  string $name             option name
	 * @param  string $value            option value
	 * @return libhg_Options_Container  self
	 */
	public function setSingle($name, $value) {
		$this->options[$name] = array(self::TYPE_SINGLE, array($value));
		return $this;
	}

	/**
	 * set multiple option
	 *
	 * @param  string $name             option name
	 * @param  array  $values           option values
	 * @return libhg_Options_Container  self
	 */
	public function setMultiple($name, array $values) {
		$this->options[$name] = array(self::TYPE_MULTIPLE, $values);
		return $this;
	}

	/**
	 * set flag
	 *
	 * @param  string $flag             flag name
	 * @return libhg_Options_Container  self
	 */
	public function setFlag($flag) {
		$this->flags[] = $flag;
		$this->flags   = array_unique($this->flags);

		return $this;
	}
}
