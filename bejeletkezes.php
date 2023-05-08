<!DOCTYPE html>
<html>
<head>
    <title>PedalBlog Bejelentkezés</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div id="login-form">
    <h1>Üdvözöllek a PedalBlog-on!</h1>
    <form action="login.php" method="post">
        <label for="email">E-mail cím:</label>
        <input type="email" id="email" name="email" placeholder="Az emailed.." required>
        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" placeholder="A jelszavad"required>
        <input type="submit" value="Bejelentkezés">
    </form>
    <p>Még nem vagy tag? <a href="regisztracio.php">Regisztrálj!</a></p>
    <p>Vissza a kezdőlapra: <a href="index.php">PedalBlog!</a></p>
</div>
</body>
</html>
