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
    $check_email_query = "SELECT email FROM felhasznalok WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $newemail);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        echo "Ez az email cím már használatban van, kérlek adj meg másikat!";
        exit();
    }

    $update_query = "UPDATE felhasznalok SET email = ? WHERE email = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ss", $newemail, $usern);

    if($stmt->execute()){
        $_SESSION['email'] = $newemail; // update the email in the session
        header("Location: profil.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
