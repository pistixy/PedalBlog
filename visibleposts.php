<?php
// loop through each post and display it
$usern = "";
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql_user = "SELECT * FROM felhasznalok WHERE email = '$email'";
    $result_user = mysqli_query($conn, $sql_user);
    if ($result_user) {
        $row_user = mysqli_fetch_assoc($result_user);
        $loggedInUsern = $row_user['usern'];
    }
}


while ($row = mysqli_fetch_assoc($result)) {
    //echo $row['POSTID'];
    $POSTID = $row['POSTID'];

    echo "<div class='post'>";
    echo "<div class ='posttext'>";

// Check if the user is logged in and the post belongs to them
    if (isset($_SESSION['usern']) && $_SESSION['usern'] == $row['usern']) {
        echo "<div class='delete-button-containerpost'>";
        echo "<form action='includes/delete_post.php' method='post'>";
        echo "<input type='hidden' name='post_id' value='" . $row['POSTID'] . "'/>";
        echo "<button type='submit' class='delete-button'>Törlés</button>";
        echo "</form>";
        echo "</div>";
    }

    echo "<h2 class='post-title'>" . $row['title'] . "</h2>";
    echo "<p>" . $row['szoveg'] . "</p>";
    echo "<p class='post-info'>" . $row['type'] . " közzétéve "  . $row['usern'] . " által " . $row['createdat'] . "-kor" . "</p>";
    echo "</div>";
    include "komment.php";
    echo "</div>";
}

include "includes/aretheremoreposts.php"
?>
