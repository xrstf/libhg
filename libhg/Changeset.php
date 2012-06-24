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
 * A single changeset
 */
class libhg_Changeset {
	public $repo     = null; ///< libhg_Repository_Interface
	public $rev      = null; ///< int
	public $node     = null; ///< string
	public $parents  = null; ///< array
	public $date     = null; ///< string
	public $author   = null; ///< string
	public $desc     = null; ///< string
	public $branch   = null; ///< string
	public $tags     = null; ///< array
	public $modified = null; ///< array
	public $added    = null; ///< array
	public $deleted  = null; ///< array

	public $shortNode = null; ///< string

	/**
	 * Constructor
	 *
	 * @param libhg_Repository_Interface $repo     the owning repository
	 * @param string                     $node
	 * @param int                        $rev
	 * @param array                      $parents
	 * @param string                     $date
	 * @param string                     $author
	 * @param string                     $desc
	 * @param string                     $branch
	 * @param array                      $tags
	 * @param array                      $modified
	 * @param array                      $added
	 * @param array                      $deleted
	 */
	public function __construct(libhg_Repository_Interface $repo, $node, $rev = null, array $parents = null, $date = null, $author = null, $desc = null, $branch = null, array $tags = null, array $modified = null, array $added = null, array $deleted = null) {
		$this->repo     = $repo;
		$this->rev      = $rev === null ? null : (int) $rev;
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
