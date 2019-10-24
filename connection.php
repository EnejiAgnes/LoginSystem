<?php
// SESSION_start();
$server_name = "localhost";
$username =  "root";
$password = "";
$dbname = "registeration";
//if the connection fails it outputs an error message
$connection = mysqli_connect($server_name,$username,$password,$dbname);
if ($connection) {
  echo("Database connection Successful");
} else {
  echo("Error");
}

// var_dump ($connection);
?>
