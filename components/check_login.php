<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: /Stellarscape/login.html");
    exit();
}
?>