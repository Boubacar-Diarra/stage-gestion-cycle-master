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
        <p>Création d'un nouveau module.</p>
        <hr>
        <form action="../controllers/ModuleDataController.php" method="POST" id="module" onsubmit="return verifieModule(this);">
            <label for="intitule">Intitulé:</label>
            <input type="text" name="intitule" id="intitule" onblur="verifieIntitule(this);">

            <label for="departement">Departement:</label>
            <input type="text" name="departement" id="departement" onblur="verifieString(this);">

            <label for="nature">Nature:</label>
            <input type="text" name="nature" id="nature" onblur="verifieString(this);">

            <label for="semestre">Semestre:</label>
            <input type="number" name="semestre" id="semestre" min="0" max="6" onblur="verifieSemestre(this);">

            <label for="objectif">Objectifs:</label>
            <input type="text" name="objectif" id="objectif" onblur="verifieString(this);">

            <label for="pre_requisPedagogique">Pre-requis pedagogiques:</label>
            <input type="text" name="pre_requisPedagogique" id="pre_requisPedagogique" onblur="verifieString(this);" placeholder="Par defaut mettez: Null">

            <label for="descriptif">Descriptif:</label>
            <input type="text" name="descriptif" id="descriptif" onblur="verifieString(this);">

            <input id="sauvegarder" type="submit" value="Terminer">
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>