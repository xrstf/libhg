<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

class libhg_Changeset {
	public $repo     = null;
	public $rev      = null;
	public $node     = null;
	public $parents  = null;
	public $date     = null;
	public $author   = null;
	public $desc     = null;
	public $branch   = null;
	public $tags     = null;
	public $modified = null;
	public $added    = null;
	public $deleted  = null;

	public $shortNode = null;

	public function __construct(libhg_Repository $repo, $node, $rev = null, array $parents = null, $date = null, $author = null, $desc = null, $branch = null, array $tags = null, array $modified = null, array $added = null, array $deleted = null) {
		$this->repo     = $repo;
		$this->rev      = $rev;
		$this->node     = $node;
		$this->parents  = $parents;
		$this->date     = $date;
		$this->author   = $author;
		$this->desc     = $desc;
		$this->branch   = $branch;
		$this->tags     = $tags;
		$this->modified = $modified;
		$this->added    = $added;
		$this->deleted  = $deleted;

		$this->shortNode = substr($node, 0, 12);
	}
}
