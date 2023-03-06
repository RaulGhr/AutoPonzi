<?php
$host = "localhost";
$usename = "root";
$pass = "root";
$bazadedate = "autoponzi";
$port = 8889;

$conn = mysqli_connect("$host:$port",$usename,$pass,$bazadedate);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>