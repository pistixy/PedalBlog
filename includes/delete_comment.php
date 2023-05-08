<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_id = $_POST['comment_id'];
    $sql = "SELECT usern FROM kommentek WHERE KOMMENTID='$comment_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['usern'] != $_SESSION['usern']) {
        header('Location: index.php?error=notauthorized');
        exit();
    }

    $sql = "DELETE FROM kommentek WHERE KOMMENTID='$comment_id'";
    mysqli_query($conn, $sql);
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}

?>
