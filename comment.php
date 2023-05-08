<?php
include "includes/connect.php";

$comment = $_POST["comment"];
$addedat = date("Y-m-d H:i:s");

session_start();
if (isset($_SESSION['usern'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM felhasznalok WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $usern = $row['usern'];
}

if (empty($usern)) {
    echo "Kommentelni csak bejelentkezés után tudsz!";
    exit;
}

// Get the POSTID value from the form submission
$POSTID = $_POST["POSTID"];

// Check if the specified POSTID exists in the posztok table
$sql = "SELECT * FROM posztok WHERE POSTID = '$POSTID'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    echo "Error: Invalid POSTID. Please check the value and try again.";
    exit;
}

$sql = "INSERT INTO kommentek (POSTID, usern, megjegyzes, addedat) VALUES ('$POSTID', '$usern', '$comment', '$addedat')";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php?comment_added=true");
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
