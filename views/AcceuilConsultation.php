<?php 
    session_start();
    $_SESSION['opName'] = 'Consultation d\'informations';
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
            <div id=""><a href="ConsultationEtudiant.php">Etudiant.</a></div>
            <hr>
            <div id=""><a href="ConsultationProfesseur.php">Professeur. </a></div>
            <hr>
            <div id=""><a href="ConsultationCoordinateur.php">Coordinateur.</a></div>
            <hr>
            <div id=""><a href="ConsultationModule.php">Module.</a></div>
            <hr>
            <div id=""><a href="ConsultationMatiere.php">Matière.</a></div>
        </p>
    </section>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>