<?php
session_start();

$conn = mysqli_connect("localhost", "root", "manvswild", "lunar");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);
  $password = $_POST["password"];

  $sql = "SELECT id, password FROM users WHERE username=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $username);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);

  if (mysqli_stmt_num_rows($stmt) == 1) {
    mysqli_stmt_bind_result($stmt, $id, $hashed_password);
    mysqli_stmt_fetch($stmt);

    if (password_verify($password, $hashed_password)) {
      $_SESSION["userid"] = $id;
      $_SESSION["username"] = $username;
      header("Location: /Stellarscape/services.php");
      exit();
    } else {
      echo "❌ Invalid password.";
    }
  } else {
    echo "❌ No user found with that username.";
  }

  mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>
