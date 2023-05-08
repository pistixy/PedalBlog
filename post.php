<?php
include "includes/connect.php";


$title = $_POST["title"];
$type = $_POST["type"];
$szoveg = $_POST["szoveg"];
$createdat = date("Y-m-d H:i:s");
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM felhasznalok WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $usern = $row['usern'];
}
$sql = "INSERT INTO posztok (usern, title, type, szoveg, createdat) VALUES ('$usern', '$title', '$type', '$szoveg', '$createdat')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");

} else {
    echo "Error: " . mysqli_error($conn);

}

mysqli_close($conn);
?>

