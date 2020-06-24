<?php 
    session_start();
    $_SESSION['opName'] = 'Ajout d\'informations';
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
            <div id=""><a href="FormulaireForCreateEtudiant.php">Etudiant. </a></div>
            <hr>
            <div id=""><a href="FormulaireForCreateProfesseur.php">Professeur.</a></div>
            <hr>
            <div id=""><a href="FormulaireForCreateCoordinateur.php">Coordinateur.</a></div>
            <hr>
            <div id=""><a href="FormulaireForCreateAU.php">Année universitaire.</a></div>
            <hr>
            <div id=""><a href="FormulaireForCreateSemestre.php">Semestre.</a></div>
            <hr>
            <div id=""><a href="FormulaireForCreateModule.php">Module.</a></div>
            <hr>
            <div id=""><a href="FormulaireForCreateMatiere.php">Matière.</a></div>
        </p>
    </section>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>