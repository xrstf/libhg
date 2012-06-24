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
 * Generated base class for `hg convert`
 *
 * @generated
 * @see     http://selenic.com/hg/help/convert
 * @package libhg.Command.Convert
 */
abstract class libhg_Command_Convert_Base extends libhg_Command_Base {
	/**
	 * 'source' argument
	 *
	 * @var string
	 */
	protected $source = null;

	/**
	 * optional 'dest' argument
	 *
	 * @var string
	 */
	protected $dest = null;

	/**
	 * optional 'revmap' argument
	 *
	 * @var string
	 */
	protected $revmap = null;

	/**
	 * optional 'configs' options (--config)
	 *
	 * @var array
	 */
	protected $configs = array();

	/**
	 * optional 'sourceType' option (-s)
	 *
	 * @var string
	 */
	protected $sourceType = null;

	/**
	 * optional 'destType' option (-d)
	 *
	 * @var string
	 */
	protected $destType = null;

	/**
	 * optional 'rev' option (-r)
	 *
	 * @var string
	 */
	protected $rev = null;

	/**
	 * optional 'authormap' option (-A)
	 *
	 * @var string
	 */
	protected $authormap = null;

	/**
	 * optional 'filemap' option (--filemap)
	 *
	 * @var string
	 */
	protected $filemap = null;

	/**
	 * optional 'splicemap' option (--splicemap)
	 *
	 * @var string
	 */
	protected $splicemap = null;

	/**
	 * optional 'branchmap' option (--branchmap)
	 *
	 * @var string
	 */
	protected $branchmap = null;

	/**
	 * 'branchsort' flag (--branchsort)
	 *
	 * @var boolean
	 */
	protected $branchsort = false;

	/**
	 * 'datesort' flag (--datesort)
	 *
	 * @var boolean
	 */
	protected $datesort = false;

	/**
	 * 'sourcesort' flag (--sourcesort)
	 *
	 * @var boolean
	 */
	protected $sourcesort = false;

	/**
	 * get source
	 *
	 * @return string  set value or null if not set
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * get dest
	 *
	 * @return string  set value or null if not set
	 */
	public function getDest() {
		return $this->dest;
	}

	/**
	 * get revmap
	 *
	 * @return string  set value or null if not set
	 */
	public function getRevmap() {
		return $this->revmap;
	}

	/**
	 * get configs
	 *
	 * @return array  set configs or array() if not set
	 */
	public function getConfigs() {
		return $this->configs;
	}

	/**
	 * get sourceType
	 *
	 * @return string  set value or null if not set
	 */
	public function getSourceType() {
		return $this->sourceType;
	}

	/**
	 * get destType
	 *
	 * @return string  set value or null if not set
	 */
	public function getDestType() {
		return $this->destType;
	}

	/**
	 * get rev
	 *
	 * @return string  set value or null if not set
	 */
	public function getRev() {
		return $this->rev;
	}

	/**
	 * get authormap
	 *
	 * @return string  set value or null if not set
	 */
	public function getAuthormap() {
		return $this->authormap;
	}

	/**
	 * get filemap
	 *
	 * @return string  set value or null if not set
	 */
	public function getFilemap() {
		return $this->filemap;
	}

	/**
	 * get splicemap
	 *
	 * @return string  set value or null if not set
	 */
	public function getSplicemap() {
		return $this->splicemap;
	}

	/**
	 * get branchmap
	 *
	 * @return string  set value or null if not set
	 */
	public function getBranchmap() {
		return $this->branchmap;
	}

	/**
	 * get branchsort
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getBranchsort() {
		return $this->branchsort;
	}

	/**
	 * get datesort
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getDatesort() {
		return $this->datesort;
	}

	/**
	 * get sourcesort
	 *
	 * @return boolean  set value or false if not set
	 */
	public function getSourcesort() {
		return $this->sourcesort;
	}

	/**
	 * get command name
	 *
	 * @return string  always 'convert'
	 */
	public function getCommandName() {
		return 'convert';
	}

	/**
	 * set source
	 *
	 * @param  string $source              the single source argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function source($source) {
		$this->source = $source;
		return $this;
	}

	/**
	 * set dest
	 *
	 * @param  string $dest                the single dest argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function dest($dest) {
		$this->dest = $dest;
		return $this;
	}

	/**
	 * set revmap
	 *
	 * @param  string $revmap              the single revmap argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function revmap($revmap) {
		$this->revmap = $revmap;
		return $this;
	}

	/**
	 * append a single or multiple configs
	 *
	 * @param  mixed $configs              a single (scalar) or multiple (array) configs
	 * @return libhg_Command_Convert_Base  self
	 */
	public function config($configs) {
		foreach ((array) $configs as $val) {
			$this->configs[] = $val;
		}

		return $this;
	}

	/**
	 * reset configs
	 *
	 * @return libhg_Command_Convert_Base  self
	 */
	public function resetConfigs() {
		$this->configs = array();
		return $this;
	}

	/**
	 * set sourceType
	 *
	 * @param  string $sourceType          the single sourceType argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function sourceType($sourceType) {
		$this->sourceType = $sourceType;
		return $this;
	}

	/**
	 * set destType
	 *
	 * @param  string $destType            the single destType argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function destType($destType) {
		$this->destType = $destType;
		return $this;
	}

	/**
	 * set rev
	 *
	 * @param  string $rev                 the single rev argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function rev($rev) {
		$this->rev = $rev;
		return $this;
	}

	/**
	 * set authormap
	 *
	 * @param  string $authormap           the single authormap argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function authormap($authormap) {
		$this->authormap = $authormap;
		return $this;
	}

	/**
	 * set filemap
	 *
	 * @param  string $filemap             the single filemap argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function filemap($filemap) {
		$this->filemap = $filemap;
		return $this;
	}

	/**
	 * set splicemap
	 *
	 * @param  string $splicemap           the single splicemap argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function splicemap($splicemap) {
		$this->splicemap = $splicemap;
		return $this;
	}

	/**
	 * set branchmap
	 *
	 * @param  string $branchmap           the single branchmap argument
	 * @return libhg_Command_Convert_Base  self
	 */
	public function branchmap($branchmap) {
		$this->branchmap = $branchmap;
		return $this;
	}

	/**
	 * set or unset branchsort flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Convert_Base  self
	 */
	public function branchsort($flag = true) {
		$this->branchsort = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset datesort flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Convert_Base  self
	 */
	public function datesort($flag = true) {
		$this->datesort = (boolean) $flag;
		return $this;
	}

	/**
	 * set or unset sourcesort flag
	 *
	 * @param  boolean $flag               true to set the flag, false to unset it
	 * @return libhg_Command_Convert_Base  self
	 */
	public function sourcesort($flag = true) {
		$this->sourcesort = (boolean) $flag;
		return $this;
	}

	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		$options = new libhg_Options_Container();

		if ($this->source !== null) $options->addArgument($this->source);
		if ($this->dest !== null) $options->addArgument($this->dest);
		if ($this->revmap !== null) $options->addArgument($this->revmap);
		if (!empty($this->configs)) $options->setMultiple('--config', $this->configs);
		if ($this->sourceType !== null) $options->setSingle('-s', $this->sourceType);
		if ($this->destType !== null) $options->setSingle('-d', $this->destType);
		if ($this->rev !== null) $options->setSingle('-r', $this->rev);
		if ($this->authormap !== null) $options->setSingle('-A', $this->authormap);
		if ($this->filemap !== null) $options->setSingle('--filemap', $this->filemap);
		if ($this->splicemap !== null) $options->setSingle('--splicemap', $this->splicemap);
		if ($this->branchmap !== null) $options->setSingle('--branchmap', $this->branchmap);
		if ($this->branchsort) $options->setFlag('--branchsort');
		if ($this->datesort) $options->setFlag('--datesort');
		if ($this->sourcesort) $options->setFlag('--sourcesort');

		return $options;
	}
}
