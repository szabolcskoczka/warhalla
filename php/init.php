<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "war_halla_webshop";

// Összeköttetés létrehozása
$conn = new mysqli($servername, $username, $password, $dbname);

// Összeköttetés ellenörzése
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}