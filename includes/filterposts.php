<div class="navbar_items dropdown">
    <?php
    if (isset($_SESSION['usern'])) {
        echo '<button>' .'Posztok szűrése'. '</button>';
        echo '<div class="dropdown-content">';
        echo '<a href="index.php?type=utazas">Utazások</a>';
        echo '<a href="index.php?type=szereles">Szerelések</a>';
        echo '<a href="index.php?type=hirdetes">Hirdetések</a>';
        echo '</div>';
    }    // check which type is set in the URL to change the button text accordingly
    if(isset($_GET['type'])) {
        switch($_GET['type']) {
            case 'utazas':
                echo '<script>document.querySelector(".navbar_items button").innerHTML = "Utazások";</script>';
                break;
            case 'szereles':
                echo '<script>document.querySelector(".navbar_items button").innerHTML = "Szerelések";</script>';
                break;
            case 'hirdetes':
                echo '<script>document.querySelector(".navbar_items button").innerHTML = "Hirdetések";</script>';
                break;
            default:
                break;
        }
    }

    ?>
</div>
