<?php
include "includes/connect.php";

$comment = $_POST["comment"];
$addedat = date("Y-m-d H:i:s");

session_start();
if (isset($_SESSION['usern'])) {
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM felhasznalok WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
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
$sql = "SELECT * FROM posztok WHERE POSTID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $POSTID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 0) {
    echo "Error: Invalid POSTID. Please check the value and try again.";
    exit;
}

$sql = "INSERT INTO kommentek (POSTID, usern, megjegyzes, addedat) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $POSTID, $usern, $comment, $addedat);

if ($stmt->execute()) {
    header("Location: index.php?comment_added=true");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
