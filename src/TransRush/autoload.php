<?php
require_once('SplClassLoader.php');

// Load the Ctct namespace
$loader = new \TransRush\SplClassLoader('TransRush', dirname(__DIR__));
$loader->register();
