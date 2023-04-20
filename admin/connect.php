<?php
// Create a database connection
$conn = mysqli_connect('localhost', 'root', '', 'war_halla_webshop');

// Check if the connection was successful
if (!$conn) {
  die('Database connection failed: ' . mysqli_connect_error());
}
mysqli_query($conn,"set names utf8");
mysqli_query($conn,"set character set utf8");
?>