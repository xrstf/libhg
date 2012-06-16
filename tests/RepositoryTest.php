<?php
/*
 * Copyright (c) 2012, webvariants GbR, http://www.webvariants.de
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_RepositoryTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider  goodRepositoriesProvider
	 */
	public function testBasics($path, $canonical) {
		$repo = new libhg_Repository($path);
		$this->assertEquals($canonical, $repo->getDirectory());
	}

	public function goodRepositoriesProvider() {
		$s = DIRECTORY_SEPARATOR;

		return array(
			array(str_replace('/', $s, LIBHG_REPOS.'/sally'),     str_replace('/', $s, LIBHG_REPOS.'/sally')),
			array(str_replace('/', $s, LIBHG_REPOS.'/sally/.hg'), str_replace('/', $s, LIBHG_REPOS.'/sally')),
		);
	}

	/**
	 * @expectedException libhg_Exception
	 * @dataProvider      badRepositoriesProvider
	 */
	public function testBadPath($path) {
		$repo = new libhg_Repository($path);
	}

	public function badRepositoriesProvider() {
		return array(
			array(''),
			array(null),
			array('nonexisting'),
			array(LIBHG_REPOS),
			array(LIBHG_REPOS.'/sally/.hg/cache'),
		);
	}

	public function testGetDefaultClient() {
		$repo   = new libhg_Repository(LIBHG_REPOS.'/sally');
		$client = $repo->getClient();

		$this->assertInstanceOf('libhg_Client_Interface', $client);
		$this->assertSame($repo, $client->getRepository());
	}

	/**
	 * @depends testGetDefaultClient
	 */
	public function testGetCustomClient() {
		$repo    = new libhg_Repository(LIBHG_REPOS.'/sally');
		$options = new libhg_Options_Container();
		$client  = new libhg_Client($options, $repo);
		$default = $repo->getClient();

		$repo->setClient($client);
		$returned = $repo->getClient();

		// this also ensures that we can overwrite the default client
		$this->assertSame($client, $returned);
	}

	public function testGetHgrc() {
		$repo = new libhg_Repository(LIBHG_REPOS.'/sally');
		$hgrc = $repo->getHgrc();
		$s    = DIRECTORY_SEPARATOR;

		$this->assertInstanceOf('libhg_Hgrc', $hgrc);
		$this->assertTrue($hgrc->exists());
		$this->assertEquals(str_replace('/', $s, LIBHG_REPOS.'/sally/.hg/hgrc'), $hgrc->getFile());
	}

	public function testRunProxy() {
		$repo    = new libhg_Repository(LIBHG_REPOS.'/sally');
		$options = new libhg_Options_Container();
		$dummy   = new libhg_Dummies_Client($options, $repo);
		$cmd     = new libhg_Command_Add_Cmd();

		$repo->setClient($dummy);

		list ($usedCmd, $usedRepo) = $repo->run($cmd);

		$this->assertSame($cmd, $usedCmd);
		$this->assertSame($repo, $usedRepo);
	}
}
