

<link rel="stylesheet" href="css/styles.css">

<?php
include "connect.php";
session_start();
if (isset($_SESSION['usern'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM felhasznalok WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $usern =$row['usern'];
    $birthday=$row['birthday'];
    $joined=$row['joined'];
}
?>

<?php
include "navbar_items.php"
?>



