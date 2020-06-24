<?php
session_start();
$_SESSION['addE'] = true;
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
        <p>Inscription d'un nouveau étudiant.</p>
        <hr>
        <form action="../controllers/EtudiantDataController.php" method="POST" id="etudiant" onsubmit="return verifieEtudiant(this);" >
            <label for="cne">Matricule:</label>
            <input type="text" name="cne" id="cne" onblur="verifieCne(this);">

            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" onblur="verifieNom(this);">

            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" onblur="verifiePrenom(this)">

            <label for="dnaissance">Date de naissance:</label>
            <input type="date" name="dn" id="dnaissance" onblur="verifieDn(this);">

            <label for="status">Status:</label>
            <input type="text" name="status" id="status" onblur="verifieStatus(this);" placeholder="Exemple: 1ère année">
            
            <input id="sauvegarder" type="submit" value="Terminer">
            
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>