<?php
session_start();
//on verfie que l'utilisateur est bien autoriser a consulter la page
include '../controllers/controleId.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GEM</title>
    <link rel="stylesheet" href="../public/css/styleInscription.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700&display=swap" rel="stylesheet">
    <?php 
        if(isset($_SESSION['OpOk']) && $_SESSION['OpOk'] == false){
            $_SESSION['OpOk'] = true;
            include '../views/colorInput.php';
        }
     ?>
</head>
<body>
    <fieldset>
        <p>Affectation d'une matière à un module.</p>
        <hr>
        <form action="../controllers/AffectMatiereToModuleDataController.php" method="POST" >
            
            <?php
                include 'insertMatiere.php';
                include 'insertModule.php';
            ?>

            <input id="sauvegarder" type="submit" value="Terminer">
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>