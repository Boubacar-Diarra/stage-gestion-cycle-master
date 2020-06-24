<?php
session_start();
$_SESSION['updateE'] = true;
require_once '../models/ConnecToDataBase.php';
require_once '../models/EtudiantManager.php';
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
        <p>Modification des infos: étudiant.</p>
        <hr>
        <form action="../controllers/EtudiantDataController.php" method="POST" id="etudiant" onsubmit="return verifieEtudiant(this);" >
            <!--mise en place d'un code php qui permettra de pre remplir certains champs -->
            <?php
                $db = ConnecToDataBase::connecToDataBaseName('gem');
                $reponse = EtudiantManager::getEtudiantAll($db);
                //on cherche le professeur dont le cne a été entré
                $estdedans = false;
                while($donnee = $reponse->fetch()){
                    if($donnee['cne'] == $_GET['cne']){
                        $estdedans = true;
                        break;
                    }
                }
                if($estdedans == false){
                    $_SESSION['OpOk'] = false;
                    header('Location: ../views/SaisieCneEtudiant.php');
                }
            ?>
            <label for="cne">Cne:</label>
            <input type="text" name="cne" id="cne" 
                <?php if($estdedans == true){
                    echo 'value = ' . $donnee['cne'];
                } ?> 
            onblur="verifieCne(this);">

            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" 
                <?php if($estdedans == true){
                        echo 'value = ' . $donnee['nom'];
                } ?>
            onblur="verifieNom(this);">

            <label for="prenom">Prénom:</label>
            <input type="text" name="prenom" id="prenom" 
                <?php if($estdedans == true){
                        echo 'value = ' . $donnee['prenom'];
                } ?>
            onblur="verifiePrenom(this)">

            <label for="dnaissance">Date de naissance:</label>
            <input type="date" name="dn" id="dnaissance" 
                <?php if($estdedans == true){
                        echo 'value = ' . $donnee['dn'];
                } ?>
            onblur="verifieDn(this);">

            <label for="status">Status:</label>
            <input type="text" name="status" id="status" 
                <?php if($estdedans == true){
                        echo 'value = ' . $donnee['status'];
                } ?>
            onblur="verifieString(this);">
            
            <div id="form-button">
                <input id="sauvegarder" type="submit" value="Terminer">
                <a href=<?php echo '"http://localhost/gemProp/views/acceuil.php?pageaffiche=etudiant&page='.$_GET['page'].'"'; ?>><input id="retour" type="button" name="" value="Retour"></a>
            </div>
            
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>