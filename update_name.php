<?php
session_start();
include "includes/connect.php";

if (isset($_POST['usern']) && isset($_POST['new_name'])){
    $usern = $_POST['usern'];
    $newname = $_POST['new_name'];

    $update_query = "UPDATE felhasznalok SET name = ? WHERE usern = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ss", $newname, $usern);

    if($stmt->execute()){
        $_SESSION['name'] = $newname; // update the name in the session
        header("Location: profil.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
$stmt->close();
$conn->close();
?>
