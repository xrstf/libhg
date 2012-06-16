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
 * Generated base class for `hg paths`
 *
 * @generated
 * @see http://selenic.com/hg/help/paths
 */
abstract class libhg_Command_Paths_Base extends libhg_Command_Base {
	/**
	 * optional 'name' argument
	 *
	 * @var string
	 */
	protected $name = null;

	/**
	 * get name
	 *
	 * @return string  set value or null if not set
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'paths'
	 */
	public function getCommandName() {
		return 'paths';
	}

	/**
	 * set name
	 *
	 * @param  string $name              the single name argument
	 * @return libhg_Command_Paths_Base  self
	 */
	public function name($name) {
		$this->name = $name;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->name !== null) $options->addArgument($this->name);

		return $options;
	}
}
