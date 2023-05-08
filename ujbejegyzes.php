<!DOCTYPE html>
<html>
<head>
    <title>Új bejegyzés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
include "includes/header.php";



?>
<div class="postdiv">
    <h1>Készítsd el az új bejegyzésed!</h1>
    <form action="post.php" method="post">

        <label for="title">Bejegyzés címe</label>
        <input style="width: 89%" type="text" id="title" name="title" placeholder="A bejegyzés címe.." required>

        <label for="type">Bejegyzés típusa</label>
        <select id="type" name="type">
            <option value="utazas" selected>Utazás</option>
            <option value="szereles">Szerelés</option>
            <option value="hirdetes">Hirdetés</option>
        </select>

        <label for="szoveg">Szöveg</label>
        <textarea class="szoveg" id="szoveg" name="szoveg" placeholder="Írj valamit.." required></textarea>
        <div style="text-align: center">
        <input type="submit" value="Submit">

        </div>
    </div>
    </form>
</div>
<?php
include "includes/footer.php"
?>
</body>
</html>
