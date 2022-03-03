<?php

$servername_db = 'localhost';
$username_db = 'root';
$password_db = '';
$name_db = 'honoursprojectmyad';
$port = 3307;

// Create connection
$conn = new mysqli($servername_db, $username_db, $password_db, $name_db, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>