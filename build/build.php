<?php
/*
 * Copyright (c) 2012, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */

if (PHP_SAPI !== 'cli') {
	die('This script must be run from CLI.');
}

if ($argc < 3) {
	die('USAGE: php '.$argv[0].' ns-prefix src-basedir [php53]');
}

$nsPrefix   = $argv[1];
$srcBasedir = rtrim(realpath($argv[2]), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
$useNS      = isset($argv[3]) && $argv[3] === 'php53';

if ($useNS) {
	$nsSep    = '\\';
	$nsPrefix = str_replace('_', '\\', $nsPrefix);
}
else {
	$nsSep    = '_';
	$nsPrefix = str_replace('\\', '_', $nsPrefix);
}

$nsPrefix = rtrim($nsPrefix, $nsSep);
$now      = date('Y-m-d H:i');
$year     = date('Y');

require_once 'SymfonyComponents/YAML/sfYaml.php';

$commands = glob('commands/*.yml');
natcasesort($commands);

foreach ($commands as $cmdYaml) {
	$cmd       = sfYaml::load($cmdYaml);
	$cmdName   = $cmd['name'];
	$cmdNameU  = ucfirst($cmdName);
	$namespace = $nsPrefix.$nsSep.$cmdNameU;
	$classDir  = $srcBasedir.str_replace($nsSep, DIRECTORY_SEPARATOR, $namespace);
	$classFile = $classDir.DIRECTORY_SEPARATOR.'Base.php';
	$fullClass = $namespace.$nsSep.'Base';

	if (!is_dir($classDir)) {
		mkdir($classDir);
	}

	$options = array();

	if (isset($cmd['multi-args'])) {
		foreach ($cmd['multi-args'] as $key => $value) {
			$options[] = new libhg_MultiArgument($key, $value);
		}
	}

	if (isset($cmd['single-args'])) {
		foreach ($cmd['single-args'] as $key => $value) {
			$options[] = new libhg_SingleArgument($key, $value);
		}
	}

	if (isset($cmd['multi-opts'])) {
		foreach ($cmd['multi-opts'] as $key => $value) {
			$options[] = new libhg_MultiOption($key, $value);
		}
	}

	if (isset($cmd['single-opts'])) {
		foreach ($cmd['single-opts'] as $key => $value) {
			$options[] = new libhg_SingleOption($key, $value);
		}
	}

	if (isset($cmd['flags'])) {
		foreach ($cmd['flags'] as $key => $value) {
			$options[] = new libhg_Flag($key, $value);
		}
	}

	$nsLine   = '';
	$classSig = "abstract class {$namespace}_Base extends libhg_Command_Base {";

	if ($useNS) {
		$nsLine   = "\nnamespace $namespace;\n";
		$classSig = 'abstract class Base extends \libhg_Command_Base {';
	}

	$fp = fopen($classFile, 'wb');
	fwrite($fp,
"<?php
/*
 * Copyright (c) $year, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */
$nsLine
/**
 * Generated base class for `hg $cmdName`
 *
 * @see       http://selenic.com/hg/help/$cmdName
 * @generated $now
 */
$classSig");

	// write field declarations
	foreach ($options as $option) {
		$option->writeDeclaration($fp);
	}

	// write getters
	foreach ($options as $option) {
		$option->writeGetter($fp);
	}

	// write getCommandName()
	fwrite($fp, "
	/**
	 * get command name
	 *
	 * @return string  always '$cmdName'
	 */
	public function getCommandName() {
		return '$cmdName';
	}
");

	// write setters
	foreach ($options as $option) {
		$option->writeSetter($fp, $fullClass);
	}

	// write getCommandOptions()
	fwrite($fp, "
	/**
	 * get command options
	 *
	 * @return libhg_Options_Interface  options container
	 */
	public function getCommandOptions() {
		\$options = new libhg_Options_Container();

");

	foreach ($options as $option) {
		$option->writeOptions($fp);
	}

	fwrite($fp, "
		return \$options;
	}
}
");

	fclose($fp);

	// write dummy result class if non exists

	$resultFile = $classDir.DIRECTORY_SEPARATOR.'Result.php';

	if (!file_exists($resultFile)) {
		$fp  = fopen($resultFile, 'wb');
		$sig = $useNS ? 'class Result' : "class {$namespace}_Result";

		fwrite($fp,
"<?php
/*
 * Copyright (c) $year, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */
$nsLine
/**
 * Generated result class for `hg $cmdName`
 *
 * @see       http://selenic.com/hg/help/$cmdName
 * @generated $now
 */
$sig {
	/**
	 * command output
	 *
	 * @var string
	 */
	public \$output;

	/**
	 * command return code
	 *
	 * @var int
	 */
	public \$code;

	/**
	 * Constructor
	 *
	 * @param string \$output  command's output
	 * @param int    \$code    command's return code
	 */
	public function __construct(\$output, \$code) {
		\$this->output = \$output;
		\$this->code   = \$code;
	}
}
");

		fclose($fp);
	}

	// write dummy command class if non exists

	$cmdFile = $classDir.DIRECTORY_SEPARATOR.'Cmd.php';

	if (!file_exists($cmdFile)) {
		$fp  = fopen($cmdFile, 'wb');
		$sig = $useNS ? 'class Cmd extends Base' : "class {$namespace}_Cmd extends {$namespace}_Base";
		fwrite($fp,
"<?php
/*
 * Copyright (c) $year, Christoph Mewes, http://www.xrstf.de/
 *
 * This file is released under the terms of the MIT license. You can find the
 * complete text in the attached LICENSE file or online at:
 *
 * http://www.opensource.org/licenses/mit-license.php
 */
$nsLine
/**
 * Generated command class for `hg $cmdName`
 *
 * @see       http://selenic.com/hg/help/$cmdName
 * @generated $now
 */
$sig {
	/**
	 * evaluate server's respond to runcommand
	 *
	 * @param  libhg_Stream_Readable      \$reader  readable stream
	 * @param  libhg_Stream_Writable      \$writer  writable stream
	 * @param  libhg_Repository_Interface \$repo    used repository
	 * @return libhg_Command_{$cmdNameU}_Result
	 */
	public function evaluate(libhg_Stream_Readable \$reader, libhg_Stream_Writable \$writer, libhg_Repository_Interface \$repo) {
		\$output = trim(\$reader->readString(libhg_Stream::CHANNEL_OUTPUT));
		\$code   = \$reader->readReturnValue();

		return new libhg_Command_{$cmdNameU}_Result(\$output, \$code);
	}
}
");

		fclose($fp);
	}
}

abstract class libhg_Option {
	public function writeDeclaration($fp) {
		$description = $this->getDescription();
		$type        = $this->getType();
		$varName     = $this->getVarName();
		$default     = $this->getDefault();

		fwrite($fp, "
	/**
	 * $description
	 *
	 * @var $type
	 */
	protected $varName = $default;
");
	}

	public function writeGetter($fp) {
		$type    = $this->getType();
		$default = $this->getDefault();
		$name    = $this->getName();
		$upper   = ucfirst($name);
		$desc    = $type === 'array' ? "set $name or $default if not set" : "set value or $default if not set";

		fwrite($fp, "
	/**
	 * get $name
	 *
	 * @return $type  $desc
	 */
	public function get$upper() {
		return \$this->$name;
	}
");
	}

	public function getType() {
		return $this->type;
	}

	public function getName() {
		return $this->name;
	}

	public function getVarName() {
		return '$'.$this->name;
	}

	public function getDefault() {
		switch (strtolower(gettype($this->default))) {
			case 'integer':
			case 'int':
				return $this->default;

			case 'double':
			case 'float':
				return sprintf('%.4F', $this->default);

			case 'null':
				return 'null';

			case 'string':
				return "'".addslashes($this->default)."'";

			case 'boolean':
				return $this->default ? 'true' : 'false';

			case 'array':
				if (empty($this->default)) {
					return 'array()';
				}

				// fallthrough

			default:
				return var_export($this->default, true);
		}
	}

	protected function inferCliName($name) {
		$name = preg_replace('/([A-Z])/', '-$1', $name);
		return '--'.strtolower($name);
	}

	abstract public function getDescription();
	abstract public function writeSetter($fp, $className);
}

class libhg_SingleArgument extends libhg_Option {
	protected $name;
	protected $type;
	protected $default;
	protected $optional;

	public function __construct($key, $option) {
		$this->name     = $key;
		$this->type     = isset($option['type'])     ? $option['type']     : 'string';
		$this->default  = isset($option['default'])  ? $option['default']  : null;
		$this->optional = isset($option['optional']) ? $option['optional'] : true;
		$this->cliName  = isset($option['cli'])      ? $option['cli']      : $this->inferCliName($key);
	}

	public function getDescription() {
		return $this->optional
			? "optional '$this->name' argument"
			: "'$this->name' argument";
	}

	public function writeSetter($fp, $className) {
		$type    = $this->getType();
		$name    = $this->getName();
		$varName = $this->getVarName();

		fwrite($fp, "
	/**
	 * set $this->name
	 *
	 * @param  $type $varName
	 * @return $className  self
	 */
	public function $name($varName) {
		\$this->$name = $varName;
		return \$this;
	}
");
	}

	public function writeOptions($fp) {
		$name = $this->name;
		$cli  = $this->cliName;

		fwrite($fp, "\t\tif (\$this->$name !== null) \$options->addArgument(\$this->$name);\n");
	}
}

class libhg_MultiArgument extends libhg_SingleArgument {
	protected $alias;

	public function __construct($key, $option) {
		parent::__construct($key, $option);

		$this->type  = 'array';
		$this->alias = isset($option['alias']) ? $option['alias'] : null;

		if ($this->default === null) {
			$this->default = array();
		}
	}

	public function getDescription() {
		return $this->optional
			? "optional '$this->name' arguments"
			: "'$this->name' arguments";
	}

	public function writeSetter($fp, $className) {
		$name    = $this->getName();
		$varName = $this->getVarName();

		fwrite($fp, "
	/**
	 * append multiple $name
	 *
	 * @param  array $varName
	 * @return $className  self
	 */
	public function $name(array $varName) {
		foreach ($varName as \$val) {
			\$this->{$name}[] = \$val;
		}

		return \$this;
	}
");

		if ($this->alias) {
			$alias     = $this->alias;
			$type      = $this->getType();
			$aliasName = '$'.$alias;

			fwrite($fp, "
	/**
	 * append a single $alias
	 *
	 * @param  $type $aliasName
	 * @return $className  self
	 */
	public function $alias($aliasName) {
		\$this->{$name}[] = $aliasName;
		return \$this;
	}
");
		}

		$upper = ucfirst($name);

		fwrite($fp, "
	/**
	 * reset $name
	 *
	 * @return $className  self
	 */
	public function reset$upper() {
		\$this->{$name} = array();
		return \$this;
	}
");
	}

	public function writeOptions($fp) {
		$name = $this->name;
		$cli  = $this->cliName;

		fwrite($fp, "\t\tif (!empty(\$this->$name)) {
			foreach (\$this->$name as \$val) {
				\$options->addArgument(\$val);
			}
		}
");
	}
}

class libhg_SingleOption extends libhg_SingleArgument {
	public function getDescription() {
		return $this->optional
			? "optional '$this->name' option ($this->cliName)"
			: "'$this->name' option ($this->cliName)";
	}

	public function writeOptions($fp) {
		$name = $this->name;
		$cli  = $this->cliName;

		fwrite($fp, "\t\tif (\$this->$name !== null) \$options->setSingle('$cli', \$this->$name);\n");
	}
}

class libhg_MultiOption extends libhg_MultiArgument {
	public function getDescription() {
		return $this->optional
			? "optional '$this->name' options ($this->cliName)"
			: "'$this->name' options ($this->cliName)";
	}

	public function writeOptions($fp) {
		$name = $this->name;
		$cli  = $this->cliName;

		fwrite($fp, "\t\tif (!empty(\$this->$name)) \$options->setMultiple('$cli', \$this->$name);\n");
	}
}

class libhg_Flag extends libhg_SingleArgument {
	public function __construct($key, $option) {
		parent::__construct($key, $option);

		$this->type     = 'boolean';
		$this->default  = isset($option['default']) ? $option['default'] : false;
		$this->optional = true;
	}

	public function getDescription() {
		return "'$this->name' flag ($this->cliName)";
	}

	public function writeSetter($fp, $className) {
		$name = $this->getName();

		fwrite($fp, "
	/**
	 * set $name
	 *
	 * @param  boolean \$flag
	 * @return $className  self
	 */
	public function $name(\$flag = true) {
		\$this->$name = (boolean) \$flag;
		return \$this;
	}
");
	}

	public function writeOptions($fp) {
		$name = $this->name;
		$cli  = $this->cliName;

		fwrite($fp, "\t\tif (\$this->$name) \$options->setFlag('$cli');\n");
	}
}
