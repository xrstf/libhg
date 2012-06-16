<?php
/*
 * Copyright (c) 2012, webvariants GbR, http://www.webvariants.de
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_HgrcTest extends PHPUnit_Framework_TestCase {
	public function testBasics() {
		$file = LIBHG_REPOS.'/sally/.hg/hgrc';

		$hgrc = new libhg_Hgrc($file);
		$this->assertEquals(str_replace('/', DIRECTORY_SEPARATOR, $file), $hgrc->getFile());
		$this->assertTrue($hgrc->exists());

		$hgrc = new libhg_Hgrc(null);
		$this->assertNull($hgrc->getFile());

		$hgrc = new libhg_Hgrc('nonexisting');
		$this->assertFalse($hgrc->exists());
	}

	/**
	 * @expectedException  libhg_Exception
	 */
	public function testCannotCheckNullFile() {
		$hgrc = new libhg_Hgrc(null);
		$hgrc->exists();
	}

	/**
	 * @expectedException  libhg_Exception
	 */
	public function testCannotReadNullFile() {
		$hgrc = new libhg_Hgrc(null);
		$hgrc->read(false);
	}

	/**
	 * @expectedException  libhg_Exception
	 */
	public function testCannotReadBadFile() {
		$hgrc = new libhg_Hgrc('nonexisting');
		$hgrc->read(false);
	}

	/**
	 * @expectedException  libhg_Exception
	 */
	public function testCannotWriteNullFile() {
		$hgrc = new libhg_Hgrc(null);
		$hgrc->write();
	}

	public function testSetData() {
		$hgrc = new libhg_Hgrc(null);
		$hgrc
			->set('mygroup', 'mykey', 'hello world')
			->set('mygroup', 'foo-bar', 'with " quotes')
			->set('numeric', 34, 42)
			->set('spaced group', 'key with spaces', 'funky')
		;

		$this->assertTrue($hgrc->has('mygroup'));
		$this->assertTrue($hgrc->has('mygroup', 'foo-bar'));
		$this->assertTrue($hgrc->has('numeric', '34'));
		$this->assertTrue($hgrc->has('spaced group', 'key with spaces'));

		// ini support is broken in 5.2
		if (version_compare(phpversion(), '5.2', '=')) {
			$this->assertEquals(array('mykey' => 'hello world', 'foo-bar' => 'with \quotes'), $hgrc->get('mygroup'));
		}
		else {
			$this->assertEquals(array('mykey' => 'hello world', 'foo-bar' => 'with " quotes'), $hgrc->get('mygroup'));
		}

		$this->assertEquals('hello world', $hgrc->get('mygroup', 'mykey'));

		$this->assertNull($hgrc->get('mYGroup'));
		$this->assertNull($hgrc->get('mygroup', 'foo-BAR'));
	}

	public function testReadFile() {
		$file = LIBHG_BASE.'/tests/data/hgrc.ini';
		$hgrc = new libhg_Hgrc($file);
		$ini  = array(
			'paths' => array(
				'default' => 'https://bitbucket.org/SallyCMS/0.2',
				'dummy-value' => 'foo \' bar'
			),
			'group-x' => array('a' => 12),
			'group y' => array('a' => 13),
		);

		$this->assertTrue($hgrc->exists());
		$this->assertSame($hgrc, $hgrc->read(true));

		$data = $hgrc->read(false);
		$this->assertEquals($ini, $data);

		$this->assertTrue($hgrc->has('paths'));
		$this->assertTrue($hgrc->has('paths', 'default'));
		$this->assertTrue($hgrc->has('group y'));
		$this->assertTrue($hgrc->has('group y', 'a'));

		$this->assertFalse($hgrc->has('missing'));
		$this->assertFalse($hgrc->has('paths', 'foo'));
		$this->assertFalse($hgrc->has('missing', 'foo'));

		$this->assertEquals($ini['paths'], $hgrc->get('paths'));
		$this->assertEquals($ini['paths']['default'], $hgrc->get('paths', 'default'));
		$this->assertEquals($ini['group y'], $hgrc->get('group y'));
		$this->assertEquals($ini['group y']['a'], $hgrc->get('group y', 'a'));

		$this->assertNull($hgrc->get('missing'));
		$this->assertNull($hgrc->get('paths', 'foo'));
		$this->assertNull($hgrc->get('missing', 'foo'));
	}

	/**
	 * @depends testReadFile
	 * @depends testSetData
	 */
	public function testWriteFile() {
		$file = LIBHG_BASE.'/tests/data/hgrcnew-'.uniqid().'.ini';
		$hgrc = new libhg_Hgrc($file);
		$hgrc
			->set('mygroup', 'mykey', 'hello world')
			->set('mygroup', 'foo-bar', 'with " quotes')
			->set('numeric', 34, 42)
			->set('spaced group', 'key with spaces', 'funky')
		;

		$this->assertFalse($hgrc->exists());
		$hgrc->write();
		$this->assertTrue($hgrc->exists());

		$hgrc->read(true);

		$this->assertTrue($hgrc->has('mygroup', 'foo-bar'));
		$this->assertTrue($hgrc->has('numeric', '34'));
		$this->assertTrue($hgrc->has('spaced group', 'key with spaces'));

		// ini support is broken in 5.2
		if (version_compare(phpversion(), '5.2', '=')) {
			$this->assertEquals(array('mykey' => 'hello world', 'foo-bar' => 'with \quotes'), $hgrc->get('mygroup'));
		}
		else {
			$this->assertEquals(array('mykey' => 'hello world', 'foo-bar' => 'with " quotes'), $hgrc->get('mygroup'));
		}

		$this->assertEquals('hello world', $hgrc->get('mygroup', 'mykey'));

		$this->assertNull($hgrc->get('mYGroup'));
		$this->assertNull($hgrc->get('mygroup', 'foo-BAR'));
	}

	/**
	 * @depends testReadFile
	 * @depends testSetData
	 */
	public function testReadDiscardsChanges() {
		$file = LIBHG_BASE.'/tests/data/hgrc.ini';
		$hgrc = new libhg_Hgrc($file);

		$this->assertFalse(
			$hgrc
				->read(true)->set('mygroup', 'mykey', 42)
				->read(true)->has('mygroup')
		);
	}

	/**
	 * @depends testWriteFile
	 */
	public function testResetFile() {
		$dummy = LIBHG_BASE.'/tests/data/hgrc-dummy.ini';
		$hgrc  = new libhg_Hgrc($dummy);
		$hgrc->set('foo', 'bar', 42)->write();

		$file = LIBHG_BASE.'/tests/data/hgrc.ini';
		$hgrc = new libhg_Hgrc($file);
		$data = $hgrc->read(true)->setFile($dummy)->read(false);

		$this->assertEquals(array('foo' => array('bar' => '42')), $data);
	}
}
