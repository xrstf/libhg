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
 * @see     http://selenic.com/hg/help/paths
 * @package libhg.Command.Paths
 */
abstract class libhg_Command_Paths_Base extends libhg_Command_Base {
	/**
	 * get command name
	 *
	 * @return string  always 'paths'
	 */
	public function getCommandName() {
		return 'paths';
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		return new libhg_Options_Container();
	}
}
