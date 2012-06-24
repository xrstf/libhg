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
 * Options interface
 *
 * @package libhg.Options
 */
interface libhg_Options_Interface {
	public function __toString();
	public function toArray();
	public function merge(libhg_Options_Interface $options);
	public function reset();

	public function getSingle($name);
	public function getMultiple($name);
	public function getFlag($name);

	public function addArgument($arg);
	public function setSingle($name, $value);
	public function setMultiple($name, array $values);
	public function setFlag($flag);

	public function getArguments();
	public function getOptions();
	public function getFlags();

	public function setRepository(libhg_Repository_Interface $repo = null);
	public function getRepository();
}
