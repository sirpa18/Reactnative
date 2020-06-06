<?php
  $host_name = "localhost";
  $database = "Asgardia";
  $user_name = "root";
  $password = "";
  $dbh = null;

  $conn = new mysqli($host_name, $user_name,$password,$database);
  if ($conn->connect_error) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
  }
?>
