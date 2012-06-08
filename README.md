libhg
=====

libhg is a PHP library, capable of connecting and interacting with a
[Mercurial command server][hgcmdsrv]. The library doesn't use any special PHP
extensions and is compatible with PHP 5.2.1 and up.

[![Build Status][travisimg]][travis]

**Note:** This project is still in a very early stage and not yet ready for
any use (especially not production use).

Concept
-------

The library consists of some helper classes and a large amount of command
classes. All command classes are derived from YAML files inside
`build/commands`, where all arguments, options and flags are defined.

The most important classes are `libhg_Repository`, which represents are
repository on the local disk and `libhg_Client`, which opens and holds the
connection to a command server.

In general, libhg will try to parse the command output as best as possible and
offer a high-level interface to Mercurial. So when doing a `hg log`, you will
get an array of `libhg_Changeset` objects, not the plain output of the `log`
command. This also means that you cannot set **all** possible command line
options (especially options regarding the output formatting are restricted). You
are of course free to implement your own commands, allowing you to execute all
commands as you like.

Installation
------------

You can use [Composer][composer] to install libhg. The package name is
**xrstf/libhg**.

    :::json
    {
       "requires": {
          "xrstf/libhg": "*"
       }
    }

Usage
-----

Since the API is mostly "fluid", you can chain almost anything.

    :::php
    <?

    // first, you need a repository object
    // (that's one of the known issues in the current command server
    // implementation: to start the server, you already need an
    // existing repository)
    $repo = new libhg_Repository('/path/to/my/repo');

    // Now, you can start a client.
    $client = $repo->getClient();
    $cient->connect();

    // get a log command
    $log = new libhg_Command_Log_Cmd();

    // or
    $log = $repo->log();

    // all options/flags/args are available as fluid methods
    $log->limit(12)->follow()->copies(false)->date('2012-06-06');

    // To execute the command, either use ->exec() if you got the
    // command from the repository ($repo->log()->run()) or use
    // the repository itself.
    $result = $repo->run($log);

    // Commands usually return a result object
    foreach ($result->changesets as $changeset) {
        print $change->node.": ".$change->desc."\n";
    }

A minimal example:

    :::php
    <?

    $repo   = new libhg_Repository('/path/to/my/repo');
    $client = $repo->getClient();

    $cient->connect();

    foreach ($repo->log()->limit(12)->exec()->changesets as $changeset) {
        print $change->node.": ".$change->desc."\n";
    }

Since the client will always send the `-R` option, you can use a single client
to perform commands on multiple repositories (you don't need one client,
meaning one hg instance, per repository).

    :::php
    <?

    $repoA  = new libhg_Repository('/path/to/my/repo');
    $repoB  = new libhg_Repository('/another/repo');
    $client = $repoA->getClient();

    $cient->connect();

    // set the client on repo B, or else it would create its own
    $repoB->setClient($client);

    $repoALog = $repoA->log()->exec();
    $repoBLog = $repob->log()->exec();

Contributing
------------

Want to contribute? Great! You can either choose to fork the canonical [Bitbucket
repo][bb] or the [GitHub mirror][github]. Just pick any and start hacking away.

Requirements
------------

* PHP 5.2.1+
* Mercurial 1.9+

License
-------

libhg is licensed under the MIT License - see the LICENSE file for details

[hgcmdsrv]: http://mercurial.selenic.com/wiki/CommandServer
[travis]: https://secure.travis-ci.org/xrstf/libhg
[travisimg]: https://secure.travis-ci.org/xrstf/libhg.png
[composer]: https://getcomposer.org/
[bb]: https://bitbucket.org/xrstf/libhg
[github]: https://github.com/xrstf/libhg
