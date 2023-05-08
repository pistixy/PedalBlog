<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PedalBlog</title>

    <link rel="stylesheet" href="css/styles.css">


</head>

<body>

<?php
include "includes/header.php"
?>





<div class="posts-container">

    <?php
    include "includes/connect.php";

    // Check if a search term was submitted
    if (isset($_GET['search'])) {
        $search_term = $_GET['search'];
        // Escape the search term to prevent SQL injection attacks
        $search_term = mysqli_real_escape_string($conn, $search_term);

        // Modify the SQL query to include the search term in the WHERE clause
        $sql = "SELECT * FROM posztok WHERE (title LIKE '%$search_term%' OR szoveg LIKE '%$search_term%' OR usern LIKE '%$search_term%' OR createdat LIKE '%$search_term%' OR POSTID LIKE '%$search_term%') ORDER BY createdat DESC";
    } else if(isset($_GET['type'])) {
        // type parameter is set
        $type = $_GET['type'];
        switch($type) {
            case 'utazas':
                $sql = "SELECT * FROM posztok WHERE type='utazas' ORDER BY createdat DESC";
                break;
            case 'szereles':
                $sql = "SELECT * FROM posztok WHERE type='szereles' ORDER BY createdat DESC";
                break;
            case 'hirdetes':
                $sql = "SELECT * FROM posztok WHERE type='hirdetes' ORDER BY createdat DESC";
                break;
            default:
                $sql = "SELECT * FROM posztok ORDER BY createdat DESC";
                break;
        }
    } else {
        // no search or type parameter set
        $limit = isset($_GET['limit']) ? $_GET['limit'] : 3;
        $sql = "SELECT * FROM posztok ORDER BY createdat DESC LIMIT $limit";
    }

    $result = mysqli_query($conn, $sql);
    include "visibleposts.php";
    ?>




</div>



<?php
      include "includes/footer.php"
?>




</body>
</html>