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
 * Generated base class for `hg tags`
 *
 * @generated
 * @see http://selenic.com/hg/help/tags
 */
abstract class libhg_Command_Tags_Base extends libhg_Command_Base {
	/**
	 * get command name
	 *
	 * @return string  always 'tags'
	 */
	public function getCommandName() {
		return 'tags';
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();


		return $options;
	}
}