<?php
session_start();
include "includes/connect.php";

if (isset($_POST['usern']) && isset($_POST['new_name'])){
    $usern = $_POST['usern'];
    $newname = $_POST['new_name'];
    $sql = "UPDATE felhasznalok SET name = '$newname' WHERE usern = '$usern'";

    if(mysqli_query($conn, $sql)){
        $_SESSION['name'] = $newname; // update the name in the session
        header("Location: profil.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

