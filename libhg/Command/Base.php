<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

abstract class libhg_Command_Base implements libhg_Command_Interface {
	public function __toString() {
		$name    = $this->getName();
		$options = (string) $this->getOptions();

		return rtrim($name.' '.$options);
	}
}