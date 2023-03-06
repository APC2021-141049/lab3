<?php
$servername = "192.168.150.213";
$username = "webprogss211";
$password = "fancyR!ce36";
$dbname = "webprogss211";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE searceo_news (
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
title VARCHAR(128) NOT NULL,
slug VARCHAR(128) NOT NULL,
body TEXT NOT NULL,
UNIQUE slug (slug)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table searceo_news created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>