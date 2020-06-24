<?php
session_start();
$_SESSION['updateP'] = true;
//on verfie que l'utilisateur est bien autoriser a consulter la page
if(isset($_SESSION['Sup']) && $_SESSION['Sup'] == true)
$formName = "Suppression Infos: professeur";
else
$formName = "Modification des infos: professeur.";
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
        <p><?php echo $formName; ?></p>
        <hr>
        <form
            <?php
                if(isset($_SESSION['Sup']) && $_SESSION['Sup'] == true){
                    echo 'action="../controllers/SuppressionProfesseur.php"';
                    $_SESSION['Sup'] = false;
                }
                else
                    echo 'action="../views/ModifierProfesseur.php"';
            ?>
            method="POST" id="professeur"
        >
            
            <label for="cne">Matricule:</label>
            <input type="text" name="cne" id="cne" onblur="verifieCne(this);">

            <input id="sauvegarder" type="submit" value="OK">
        </form>
    </fieldset>

    <!-- inclusion de nos scripts -->
    <script type="text/javascript" src="../public/js/ConfirmFormulaire.js"></script>
</body>
</html>