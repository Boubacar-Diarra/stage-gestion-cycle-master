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
        <p>Création d'une nouvelle matière.</p>
        <hr>
        <form action="../controllers/MatiereDataController.php" method="POST" id="matiere" onsubmit="return verifieMatiere(this);">
            <label for="intitule">Intitulé:</label>
            <input type="text" name="intitule" id="intitule" onblur="verifieIntitule(this);">

            <label for="volumeHoraireCours">Volume horaire du cours:</label>
            <input type="number" name="volumeHoraireCours" id="volumeHoraireCours" min="0" onblur="verifieVolumeHoraire(this);">

            <label for="volumeHoraireTd">Volume horaire des Td:</label>
            <input type="number" name="volumeHoraireTd" id="volumeHoraireTd" min="0" onblur="verifieVolumeHoraire(this);">

            <label for="volumeHoraireTp">Volume horaire des Tp:</label>
            <input type="number" name="volumeHoraireTp" id="volumeHoraireTp" min="0" onblur="verifieVolumeHoraire(this);">

            <label for="nombreEvaluation">Nombre d'valuation:</label>
            <input type="number" name="nombreEvaluation" id="nombreEvaluation" min="0" onblur="verifieNbrEvaluation(this);">

            <label for="activitePratique">Activités pratiques:</label>
            <input type="text" name="activitePratique" id="activitePratique" onblur="verifieString(this);" placeholder="Par defaut mettez: Null">

            <label for="pourcentageNote">Pourcentage de la note:</label>
            <input type="text" name="pourcentageNote" id="pourcentageNote" onblur="verifiePourcentage(this);" placeholder="Exemple: 45.50">

            <input id="sauvegarder" type="submit" value="Terminer">
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>