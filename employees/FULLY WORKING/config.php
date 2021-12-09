<?php
  const DBHOST = 'localhost';
  const DBUSER = '119253';
  const DBPASS = 'saltaire';
  const DBNAME = '119253';

  $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

  if ($conn->connect_error) {
    die('Could not connect to the database!' . $conn->connect_error);
  }
?>