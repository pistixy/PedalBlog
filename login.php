<?php
session_start(); // start the session
include "includes/connect.php";

// Check if the username and password exist in the database
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM felhasznalok WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  // Verify the hashed password
  if (password_verify($password, $row['password'])) {
    // The password is correct, set session variables
    $_SESSION['usern'] = $row['usern'];
    $_SESSION['email'] = $email;
    $_SESSION['loggedin'] = true;
    header("Location: index.php");
    exit;
  }
}
// The username and password are incorrect
echo "Helytelen felhasználónév vagy jelszó! <a href='bejeletkezes.php'>Bejelentkezés újra</a>";

mysqli_close($conn);
?>
