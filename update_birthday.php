<?php
session_start();
include "includes/connect.php";

if (isset($_POST['birthday']) && isset($_POST['new_birthday'])){
    $birthday = $_POST['birthday'];
    $newbirthday = $_POST['new_birthday'];

    // Check if user is at least 14 years old
    try {
        $dob = new DateTime($newbirthday);
        $today = new DateTime();
        $age = $today->diff($dob)->y;
        if ($age < 14) {
            echo "Az oldal használatához legalább 14 évesnek kell lenned!";
            exit();
        }
    } catch (Exception $e) {
        echo "Hiba történt: A születési dátumodat ebben a formában adhatod meg: ÉÉÉÉ-HH-NN" . $e->getMessage();
        exit();
    }

    $sql = "UPDATE felhasznalok SET birthday = '$newbirthday' WHERE birthday = '$birthday'";

    if(mysqli_query($conn, $sql)){
        $_SESSION['birthday'] = $newbirthday; // update the birthday in the session
        header("Location: profil.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
