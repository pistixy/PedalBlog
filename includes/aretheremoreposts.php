<?php
// retrieve the limit from the query parameters
$limit = isset($_GET['limit']) ? $_GET['limit'] : 3;

// check if there are more posts to show
$sql = "SELECT COUNT(*) as total FROM posztok";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$totalPosts = $data['total'];

if ($totalPosts > $limit) {
// calculate the new limit for the button
    $newLimit = $limit + 3;


// check if there are less than 3 posts available to show
    if ($newLimit > $totalPosts) {
        $newLimit = $totalPosts;
    }

// display the button
    echo "<button class='load-more-container' onclick=\"window.location.href='index.php?limit=$newLimit';\">";
    echo "További bejegyzések betöltése";
    echo "</button>";

}
?>
