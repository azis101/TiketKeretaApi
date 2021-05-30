<?php
$servername = "trunojoyopython.com";
$username = "trunojoy_kuliah";
$password = "unijoyo2021";
$dbname = "trunojoy_hotel";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>