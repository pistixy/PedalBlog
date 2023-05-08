<?php
session_start();
include "includes/connect.php";

if (isset($_POST['email']) && isset($_POST['new_email'])){
    $usern = $_POST['email'];
    $newemail = $_POST['new_email'];

    if(!filter_var($newemail, FILTER_VALIDATE_EMAIL)){
        echo "Az email címed email formátumú kell legyen!";
        exit();
    }

    // Check if the new email already exists in the database
    $check_email_query = "SELECT email FROM felhasznalok WHERE email = '$newemail'";
    $result = mysqli_query($conn, $check_email_query);
    if(mysqli_num_rows($result) > 0){
        echo "Ez az email cím már használatban van, kérlek adj meg másikat!";
        exit();
    }

    $sql = "UPDATE felhasznalok SET email = '$newemail' WHERE email = '$usern'";

    if(mysqli_query($conn, $sql)){
        $_SESSION['email'] = $newemail; // update the email in the session
        header("Location: profil.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
