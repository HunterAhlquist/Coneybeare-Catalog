<?php
/*
 * NOTICE:
 * THIS FILE MAY CONTAIN PRIVATE INFORMATION
 */
function connect()
{
//connection variables
    $servername = "localhost";
    $username = "SQL_Username";
    $password = "SQL_Password";
    $database = 'database_name';

//attempt connection
    $db = mysqli_connect($servername, $username, $password, $database)
    or die("Error connecting to database" . $db->connect_error);

    return $db;
}