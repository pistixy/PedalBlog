<?php

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $sql = "SELECT usern FROM posztok WHERE POSTID='$post_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['usern'] != $_SESSION['usern']) {
        header('Location: index.php?error=notauthorized');
        exit();
    }
    $sql = "DELETE FROM posztok WHERE POSTID='$post_id' LIMIT 1";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM kommentek where POSTID='$post_id'";
    mysqli_query($conn, $sql);
    header('Location: ../index.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}

?>
