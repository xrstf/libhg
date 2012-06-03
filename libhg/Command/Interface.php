<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

interface libhg_Command_Interface {
	public function __toString();
	public function getOptions();
	public function usesNoRepositoryOption();
	public function evaluate(libhg_Stream_Readable $reader, libhg_Stream_Writable $writer, libhg_Repository_Interface $repo);
}
