<?php
/*
 * Copyright (c) 2012, webvariants GbR, http://www.webvariants.de
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_OptionsTest extends PHPUnit_Framework_TestCase {
	public function testBasics() {
		$options = new libhg_Options_Container();
		$this->assertEquals(array(), $options->toArray());
	}
}
