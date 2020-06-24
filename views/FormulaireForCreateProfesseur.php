<?php
session_start();
$_SESSION['addP'] = true;
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
        <p>Affectation d'un nouveau professeur.</p>
        <hr>
        <form action="../controllers/ProfesseurDataContoller.php" method="POST" id="professeur" onsubmit="verifieProfesseur(this);" >
            <label for="cne">Matricule:</label>
            <input type="text" name="cne" id="cne" onblur="verifieCne(this);">

            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" onblur="verifieNom(this);">

            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" onblur="verifiePrenom(this)">

            <label for="dnaissance">Date de naissance:</label>
            <input type="date" name="dn" id="dnaissance" onblur="verifieDn(this);">

            <label for="grade">Grade:</label>
            <input type="text" name="grade" id="grade" onblur="verifieString(this);">

            <label for="specialite">Specialité:</label>
            <input type="text" name="specialite" id="specialite" onblur="verifieString(this);">

            <label for="departement">Departement:</label>
            <input type="text" name="departement" id="departement" onblur="verifieString(this);">

            <label for="etablissement">Etablissement:</label>
            <input type="text" name="etablissement" id="etablissement" onblur="verifieString(this);" value="INSEA">

            <input id="sauvegarder" type="submit" value="Terminer">
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>