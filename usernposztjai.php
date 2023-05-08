<?php
include "includes/header.php";

include "includes/connect.php";
$limit = isset($_GET['limit']) ? $_GET['limit'] : 3;
$sql = "SELECT * FROM posztok WHERE usern='$usern' ORDER BY createdat  DESC LIMIT $limit";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)    ==0){
    echo "Még nincsenek posztjaid! <a href='ujbejegyzes.php'>Létrehozás</a>";
}
include "visibleposts.php";


include "includes/footer.php";
?>