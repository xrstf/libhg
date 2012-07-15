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
 * Collection of helper methods
 */
class libhg_Util {
	public static function prepareChangegroupOptions(libhg_Options_Interface $container, $style = 'full') {
		// make sure we have a output format we can understand
		$container->setSingle('--style', realpath(dirname(__FILE__).'/../hg-styles/'.$style.'.style'));

		// no progress or info messages
		$container->setFlag('-q');

		// make hg show trivial parents (i.e. non-merge parents)
		$container->setFlag('--debug');

		return $container;
	}
}
