<?php
/**
 * @var mysqli $db
 */
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to DB
require (getenv("HOME").'/backend.php'); //drop backend.php into /home/[YOUR USERNAME HERE]/
$db = connect();
require (getenv("HOME").'/settings.php'); //load settings