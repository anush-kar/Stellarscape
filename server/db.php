<?php
$host = 'localhost';
$db = 'lunar';
$user = 'root';
$pass = 'manvswild'; // change if needed

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>