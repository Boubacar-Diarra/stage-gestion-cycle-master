<?php 
    session_start();
    $_SESSION['opName'] = 'Organisation des données';
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
            <div id=""><a href="AffectModuleToSemestre.php">Affecter un module a un semestre.</a></div>
            <hr>
            <div id=""><a href="AffectEtudiantToSemestre.php">Affecter un étudiant a M1 ou à M2.</a></div>
            <hr>
            <div id=""><a href="AffectMatiereToModule.php">Affecter une matière dans la liste des matières qui constituent un module.</a></div>
            <hr>
            <div id=""><a href="AffectModuleToEtudiant.php">Affecter un module dans la liste des cours suivie par un étudiant.</a></div>
            <hr>
            <div id=""><a href="AffectMatiereToProfesseur.php">Affecter une matière dans la liste des matières enseigner par un professeur.</a></div>
            <hr>
            <div id=""><a href="AffectSemestreToAU.php">Affecter un semestre comme un des deux semestres d’une année universitaire.</a></div>
            <hr>
            <div id=""><a href="AffectModuleToCoordinateur.php">Affecter un module dans la liste des modules supervisés par un professeur.</a></div>
        </p>
    </section>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>