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
 * Repository interface
 *
 * @package libhg.Repository
 */
interface libhg_Repository_Interface {
	/**
	 * get directory
	 *
	 * @return string  path without trailing directory separator
	 */
	public function getDirectory();
}
