<?php
// insert_user.php (run this once to insert a user)
$conn = mysqli_connect("localhost", "root", "manvswild", "lunar");

$username = 'testuser';
$password = password_hash('test123', PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);

echo "User inserted!";
?>