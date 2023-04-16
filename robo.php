<?php


// Execute this php
// ex) $ php robo.php list

require_once __DIR__. '/vendor/autoload.php';

use Robo\Robo;
use RoboSandbox\Robo\MyApplication;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

// Create input/output
$input = new ArgvInput($argv);
$output = new ConsoleOutput();

$config = Robo::createConfiguration([
    __DIR__ . '/robo.yml'
]);

// Load application config
// $config = new Config(require __DIR__. '/config.php');

// using-your-own-dependency-injection-container-with-robo-advanced
// https://robo.li/docs/framework.html#using-your-own-dependency-injection-container-with-robo-advanced
$app = new MyApplication($config, $input, $output);

// Execute
exit($app->run($input, $output));
