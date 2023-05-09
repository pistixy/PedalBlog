<?php
echo "<div class='comment'>";

// Check if user is signed in
if (isset($_SESSION['usern'])) {
    $user_signed_in = true;
} else {
    $user_signed_in = false;
}
// fetch comments for the post
$sql_comments = "SELECT * FROM kommentek WHERE POSTID = ?";
$stmt_comments = $conn->prepare($sql_comments);
$stmt_comments->bind_param("s", $POSTID);
$stmt_comments->execute();
$result_comments = $stmt_comments->get_result();

if ($result_comments->num_rows > 0) {
    echo "<h3>Megjegyzések:</h3>";
    while ($row_comments = $result_comments->fetch_assoc()) {
        echo "<div class='comment'>";
        echo "<p>" . htmlspecialchars($row_comments['megjegyzes']) . "</p>";
        echo "<p class='comment-info'>" . htmlspecialchars($row_comments['usern']) . " által " . htmlspecialchars($row_comments['addedat']) . "-kor" . "</p>";

        // Check if current comment was written by signed-in user
        if ($user_signed_in && $row_comments['usern'] == $_SESSION['usern']) {
            $user_comment = true;
        } else {
            $user_comment = false;
        }

        // Display delete button if user is signed in and the comment belongs to them
        if ($user_signed_in && $user_comment) {
            echo "<div class='delete-button-container'>";
            echo "<form action='includes/delete_comment.php' method='post'>";
            echo "<input type='hidden' name='comment_id' value='" . htmlspecialchars($row_comments['KOMMENTID']) . "'>";
            echo "<button type='submit' class='delete-button'>Törlés</button>";
            echo "</form>";
            echo "</div>";
        }
        echo "</div>";
    }
} else {
    echo "<h5>Megjegyzések:</h5>";
    echo "<p>Még nem fűztek hozzá megjegyzést.</p>";
}

echo "<form action='comment.php' method='post'>";
if ($user_signed_in) {
    echo "<textarea class='comment' id='comment' name='comment' placeholder='Megjegyzés hozzáfűzése mint " . htmlspecialchars($_SESSION['usern']) . "' required></textarea>";
} else {
    echo "<textarea class='comment' id='comment' name='comment' placeholder='A megjegyzés hozzáfűzéséhez előbb be kell jelentkezz!' required></textarea>";
}
echo "<input type='hidden' name='POSTID' value='" . htmlspecialchars($POSTID) . "'>";
echo "<input type='submit' value='Hozzáfűzés'>";
echo "</form>";
echo "</div>";
?>
