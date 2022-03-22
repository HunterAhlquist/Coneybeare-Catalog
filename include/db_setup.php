<?php
/**
 * @var mysqli $db
 */
// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

$user = posix_getpwuid(posix_getuid());

// Connect to DB
require ( $user['dir'].'/backend.php'); //drop backend.php into /home/[YOUR USERNAME HERE]/
$db = connect();
require ($user['dir'].'/settings.php'); //load settings