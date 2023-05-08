
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>
<?php
include "includes/header.php";

?>
<div class="profiltabla">
    <table>
        <tr>
            <td><label>A neved: </label></td>
            <td>
                <form method="POST" action="update_name.php">
                    <?php echo "<input name='new_name' placeholder='$name'>"?>
                    <input type="hidden" name="usern" value="<?php echo $usern; ?>">
            </td>
            <td class="modositas ">
                <button type="submit" name="namechange">Mentés</button>
            </td>
            </form>
        </tr>
        <tr>
            <td><label>Az emailcímed: </label></td>
            <td>
                <form method="POST" action="update_email.php">
                    <?php echo "<input name='new_email' placeholder='$email'>"?>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
            </td>
            <td class="modositas ">
                <button type="submit" name="emailchange">Mentés</button>
            </td>
            </form>
        </tr>
        <tr>
            <td>A felhaszáló neved:</td>
            <td><?php echo $usern ?></td>
            <td class="modositas ">A felhasználó neved nem módosíthatod!</td>
        </tr>
        <tr>
            <td><label>A születési dátumod: </label></td>
            <td>
                <form method="POST" action="update_birthday.php">
                    <?php echo "<input name='new_birthday' placeholder='$birthday'>"?>
                    <input type="hidden" name="birthday" value="<?php echo $birthday; ?>">
            </td>
            <td class="modositas ">
                <button type="submit" name="birthdaychange">Mentés</button>
            </td>
            </form>
        </tr>



        <tr>
            <td>Posztjaid száma:</td>
            <td><?php
                $sql = "SELECT COUNT(*) AS count FROM posztok WHERE usern='$usern'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $count = $row['count'];
                echo "$count"
                ?></td>
            <td class="modositas "><a href="ujbejegyzes.php">Hozzáadás</a></td>
        </tr>
        <tr>
            <td>Csatlakozásod dátuma:</td>
            <td><?php echo $joined ?></td>
        </tr>
        <tr>
            <td>Posztjaim: </td>
            <td><a href="usernposztjai.php"><button>Listázás</button></a></td>
        </tr>
    </table>
</div>


<?php
include "includes/footer.php";
mysqli_close($conn);
?>
</body>
</html>
