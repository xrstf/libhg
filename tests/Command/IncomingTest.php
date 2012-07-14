<?php
/*
 * Copyright (c) 2012, webvariants GbR, http://www.webvariants.de
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Command_IncomingTest extends PHPUnit_Framework_TestCase {
	/**
	 * @see ticket #1
	 */
	public function testUrlRewriting() {
		$repo   = new libhg_Repository(LIBHG_REPOS.'/sally');
		$client = $repo->getClient();
		$hgrc   = $repo->getHgrc();

		$hgrc->read();
		$hgrc->set('paths', 'default', 'https://bitbucket.org/sallycms/0.2');
		$hgrc->write();

		$client->connect();

		$cmd    = $repo->cmd('incoming');
		$result = $cmd->exec();

		$this->assertEquals(1, $result->code); // 1 = no incoming changes
	}
}
