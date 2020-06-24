<?php 
    session_start();
    $_SESSION['opName'] = 'Supression d\'informations';
    //cette variable nous permettra de savoir quel controlleur appellé dans SaisieCne...
    $_SESSION['Sup'] = true;
    //on verfie que l'utilisateur est bien autoriser a consulter la page
    include '../controllers/controleId.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/styleAutre.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700&display=swap" rel="stylesheet">
    <title>GEM</title>
</head>
<body>
    <?php
        include 'navigation.php';
    ?>
    <section>
    <?php
        include 'operationName.php';
    ?>
        <p>
            <div id=""><a href="SaisieCneEtudiant.php">Etudiant.</a></div>
            <hr>
            <div id=""><a href="SaisieCneProfesseur.php">Professeur.</a></div>
            <hr>
            <div id=""><a href="SaisieCneCoordinateur.php">Coordinateur.</a></div>
        </p>
    </section>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>