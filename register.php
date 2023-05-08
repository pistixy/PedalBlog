<?php
include "includes/connect.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$birthday = $_POST["birthday"];

// Calculate the age based on the birthday
$birthdate = new DateTime($birthday);
$today = new DateTime();
$age = $today->diff($birthdate)->y;

if ($age < 14) {
  echo "Az oldal használatához legalább 14 évesnek kell lenned! <a href='regisztracio.php'>Próbálkozás újra</a>";
} else {
  $temp = $_POST["email"];
  $temparray = explode("@", $temp);
  $usern = $temparray[0];
  $joined = date("Y-m-d H:i:s");
  $admin = 0;
  // Check if the email already exists in the database
  $sql = "SELECT * FROM felhasznalok WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // Email already exists, registration failed
    echo "A megadott email címmel már regisztráltak! Kérjük, használjon másik email címet. <a href='regisztracio.php'>Próbálkozás újra</a>";
  } else {
    // Email does not exist, proceed with registration
    $jelszoujra = $_POST["jelszoujra"];
    if ($jelszoujra !== $password) {
      echo "A jelszavak nem egyeznek, <a href='regisztracio.php'>Próbálja újra</a>";
    } else {
      // Hash the password
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Insert the new user into the database
      $stmt = $conn->prepare("INSERT INTO felhasznalok (name, email, password, birthday, usern, admin, joined) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssis", $name, $email, $hashed_password, $birthday, $usern, $admin, $joined);
      $stmt->execute();

      if (mysqli_query($conn, $sql)) {
        echo "Sikeres regisztráció!";
        include_once "login.php";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
  }
}
?>
