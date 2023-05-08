<div class="navbar">
    <div class="logo">
        <a href="index.php">
            <img src="css/logo.png">
        </a>
    </div>


    <?php
    include "searchposts.php"
    ?>


    <?php
    include "filterposts.php"
    ?>





    <div class="navbar_items">
        <?php
        if (isset($_SESSION['usern'])) {
            if (basename($_SERVER['PHP_SELF']) === 'ujbejegyzes.php') {
                echo '<a href="index.php">' .'Vissza a főoldalra'. '</a>';
            } else {
                echo '<a href="ujbejegyzes.php">' .'Bejegyzés hozzáadaása+'. '</a>';
            }
        } else {
            echo '';
        }
        ?>
    </div>

    <div class="navbar_items">
        <?php if (isset($_SESSION['usern'])) {
            echo '<a href="profil.php">' . $usern . '</a>';
        }
        else{
            echo '<a href="bejeletkezes.php">Bejelentkezés</a>';
        }
        ?>
    </div>

    <div class="navbar_items">
        <?php if (isset($_SESSION['usern'])) {
            echo '<a href="logout.php">Kijelentkezés</a>';
        }
        else{
            echo '<a href="regisztracio.php">Regisztráció</a>';
        }
        ?>
    </div>
</div>