<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

define('LIBHG_BASE',  rtrim(realpath(dirname(__FILE__).'/../'), DIRECTORY_SEPARATOR));
define('LIBHG_REPOS', LIBHG_BASE.DIRECTORY_SEPARATOR.'repos');

require LIBHG_BASE.'/Autoload.php';

foreach (glob(LIBHG_BASE.'/tests/Dummies/*.php') as $file) {
	require $file;
}
