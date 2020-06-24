<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GEM</title>
    <link rel="stylesheet" href="public/css/styleLogin.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700&display=swap" rel="stylesheet">
</head>
<body>
    <fieldset>
        <p>Connextion administrateur.</p>
        <hr>
        <form action="controllers/AdminLoginController.php" method="POST" >
            <label for="username">User name:</label>
            <input type="text" name="username" id="username" value="<?php if(isset($_SESSION['username'])) echo($_SESSION['username']); ?>">

            <label for="mdp">Password:</label>
            <input type="password" name="mdp" id="mdp">
            
            <input id="sauvegarder" type="submit" value="OK">
        </form>
    </fieldset>
</body>
</html>