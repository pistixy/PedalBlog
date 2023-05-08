<!DOCTYPE html>
<html>
<head>
    <title>PedalBlog Regisztráció</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="login-form">
    <h1>Üdvözöllek a PedalBlog-on!</h1>
    <form action="register.php" method="POST">
        <label for="name">Teljes név:</label>
        <input type="text" id="name" name="name" placeholder="A neved.."required>

        <label for="birthday">Születési Dátum:</label>
        <input type="date" id="birthday" name="birthday" "required>

        <label for="email">E-mail cím:</label>
        <input type="email" id="email" name="email" placeholder="Az email címed.."required>

        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" placeholder="A jelszavad.."required>

        <label for="jelszoujra">Jelszó újra:</label>
        <input type="password" id="jelszoujra" name="jelszoujra" placeholder="A jelszavad újra..">

        <button class="register_button" type="submit" name="register_btn">Regisztráció</button>

    </form>
    <p>Már tag vagy? <a href="bejeletkezes.php">Jelentkezz be!</a></p>
    <p>Vissza a kezdőlapra: <a href="index.php">PedalBlog!</a></p>



</div>
</body>
</html>
