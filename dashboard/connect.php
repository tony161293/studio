<?php
$servername="localhost";
$username="root";
$db="studio_db";
$pass="root";
$con = mysqli_connect($servername, $username, $pass, $db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 