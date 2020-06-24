<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GEM</title>
    <link rel="stylesheet" href="../public/css/styleInscription.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700&display=swap" rel="stylesheet">
</head>
<body>
    <fieldset>
        <p>Connextion administrateur.</p>
        <hr>
        <form action="../controllers/AdminLoginController.php" method="POST" >
            <label for="username">User name:</label>
            <input type="text" name="username" id="username">

            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" id="mdp">
            
            <input id="sauvegarder" type="submit" value="Connextion">
        </form>
    </fieldset>
</body>
</html>