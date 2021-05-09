<?php
$servername = "localhost";
$username = "root";
$password = "L8SvfGGaUr";
$dbname = "IQcb46UcoZ";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
