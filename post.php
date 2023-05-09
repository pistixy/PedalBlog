<?php
include "includes/connect.php";

$title = $_POST["title"];
$type = $_POST["type"];
$szoveg = $_POST["szoveg"];
$createdat = date("Y-m-d H:i:s");
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM felhasznalok WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $usern = $row['usern'];

        $stmt = $conn->prepare("INSERT INTO posztok (usern, title, type, szoveg, createdat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $usern, $title, $type, $szoveg, $createdat);
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Session not found.";
}

$stmt->close();
$conn->close();
?>
