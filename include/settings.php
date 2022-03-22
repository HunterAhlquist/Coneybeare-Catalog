<?php
//place me in the backend/HOME directory! Sensitive data should NOT be here
//make edits here
$activeTable = "company";
$newEntryMailbox = "debug@minotaurs.greenriverdev.com"; //this is a **local** email address where notification of new applications get sent.

//DO NOT EDIT PAST THIS POINT UNLESS YOU CHANGE THE CALLS IN THE SOURCE CODE
$defaultTableSetup = "CREATE TABLE $activeTable (
  id int NOT NULL AUTO_INCREMENT,
  public tinyint DEFAULT 0,
  rejected tinyint DEFAULT 0,
  name text,
  image text,
  category text,
  tag_cloud text,
  about text,
  url text,
  street text,
  city text,
  state text,
  country text,
  scale text,
  email text,
  phone text,
  privName text,
  privEmail text,
  privPhone text,
  PRIMARY KEY (id)
)";

//check if table exists
$check = mysqli_query($db, 'SELECT * FROM '. $activeTable . ' LIMIT 1');
if (is_bool($check)){
    if (!$check)
        $newTable = mysqli_query($db, $defaultTableSetup);
}