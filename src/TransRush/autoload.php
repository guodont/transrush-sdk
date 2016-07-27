<?php
require_once('SplClassLoader.php');

// Load the Ctct namespace
$loader = new \TransRush\SplClassLoader('Ctct', dirname(__DIR__));
$loader->register();
