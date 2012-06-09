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
		$this->assertEquals('', (string) $options);

		$repo = new libhg_Repository(LIBHG_REPOS.'/sally');
		$options->setRepository($repo);
		$this->assertSame($repo, $options->getRepository());

		$repo2 = clone $repo;
		$options->setRepository($repo2);
		$this->assertNotSame($repo, $options->getRepository());
		$this->assertSame($repo2, $options->getRepository());
	}

	/**
	 * @depends testBasics
	 */
	public function testArguments() {
		$options = new libhg_Options_Container();
		$options->addArgument('foo');
		$options->addArgument('bar');

		$this->assertEquals(array('foo', 'bar'), $options->getArguments());
		$this->assertEquals('foo bar', (string) $options);

		// the base container does no quoting, since all arguments are sent separately
		$options->addArgument('a b c');
		$this->assertEquals(array('foo', 'bar', 'a b c'), $options->getArguments());
		$this->assertEquals('foo bar a b c', (string) $options);

		// reset all
		$options->reset();
		$this->assertEquals(array(), $options->toArray());
		$this->assertEquals('', (string) $options);
	}

	/**
	 * @depends testBasics
	 */
	public function testSingleOptions() {
		$options = new libhg_Options_Container();
		$options->setSingle('--foo', 'bar');
		$options->setSingle('--a', 140);

		$this->assertEquals(array('--foo' => array('bar'), '--a' => array(140)), $options->getOptions());
		$this->assertEquals('--foo bar --a 140', (string) $options);
		$this->assertEquals('bar', $options->getSingle('--foo'));
		$this->assertEquals(array('bar'), $options->getMultiple('--foo'));
		$this->assertEquals(140, $options->getSingle('--a'));
		$this->assertEquals(null, $options->getSingle('--missing'));

		// change value
		$options->setSingle('--foo', 'bar2');
		$this->assertEquals(array('--foo' => array('bar2'), '--a' => array(140)), $options->getOptions());
		$this->assertEquals('--foo bar2 --a 140', (string) $options);
		$this->assertEquals('bar2', $options->getSingle('--foo'));

		// empty values are valid
		$options->setSingle('--foo', '');
		$this->assertEquals(array('--foo' => array(''), '--a' => array(140)), $options->getOptions());
		$this->assertEquals('--foo --a 140', (string) $options);
		$this->assertEquals('', $options->getSingle('--foo'));

		// reset all
		$options->reset();
		$this->assertEquals(array(), $options->toArray());
		$this->assertEquals('', (string) $options);
		$this->assertEquals(null, $options->getSingle('--foo'));
	}

	/**
	 * @depends testSingleOptions
	 */
	public function testMultiOptions() {
		$options = new libhg_Options_Container();
		$options->setMultiple('--foo', array('bar', 'baz'));
		$options->setMultiple('--a', array());

		$this->assertEquals(array('--foo' => array('bar', 'baz'), '--a' => array()), $options->getOptions());
		$this->assertEquals('--foo bar --foo baz', (string) $options);
		$this->assertEquals(array('bar', 'baz'), $options->getMultiple('--foo'));
		$this->assertEquals('bar', $options->getSingle('--foo'));
		$this->assertEquals(array(), $options->getMultiple('--a'));
		$this->assertEquals(null, $options->getMultiple('--missing'));

		// change value
		$options->setMultiple('--foo', array('bar'));
		$this->assertEquals(array('--foo' => array('bar'), '--a' => array()), $options->getOptions());
		$this->assertEquals('--foo bar', (string) $options);
		$this->assertEquals(array('bar'), $options->getMultiple('--foo'));
		$this->assertEquals('bar', $options->getSingle('--foo'));

		// empty values are valid
		$options->setMultiple('--a', array(''));
		$this->assertEquals(array('--foo' => array('bar'), '--a' => array('')), $options->getOptions());
		$this->assertEquals('--foo bar --a', (string) $options);
		$this->assertEquals(array(''), $options->getMultiple('--a'));
		$this->assertEquals('', $options->getSingle('--a'));

		// reset all
		$options->reset();
		$this->assertEquals(array(), $options->toArray());
		$this->assertEquals('', (string) $options);
	}

	/**
	 * @depends testBasics
	 */
	public function testFlags() {
		$options = new libhg_Options_Container();
		$options->setFlag('--foo');
		$options->setFlag('--a');

		$this->assertEquals(array('--foo', '--a'), $options->getFlags());
		$this->assertEquals('--foo --a', (string) $options);
		$this->assertEquals(true, $options->getFlag('--foo'));
		$this->assertEquals(null, $options->getFlag('--missing'));

		// setting an existing flag should do nothing
		$options->setFlag('--a');
		$this->assertEquals(array('--foo', '--a'), $options->getFlags());
		$this->assertEquals('--foo --a', (string) $options);

		// reset all
		$options->reset();
		$this->assertEquals(array(), $options->toArray());
		$this->assertEquals('', (string) $options);
	}

	/**
	 * @depends testFlags
	 */
	public function testJoiningFlags() {
		$options = new libhg_Options_Container();

		$options->setFlag('--foo');
		$options->setFlag('-a');
		$options->setFlag('-b');
		$options->setFlag('--bla');
		$this->assertEquals('--foo --bla -ab', (string) $options);

		$options->setFlag('-long');
		$this->assertEquals('--foo --bla -long -ab', (string) $options);
		$options->setFlag('-A');
		$this->assertEquals('--foo --bla -long -abA', (string) $options);
	}
}
