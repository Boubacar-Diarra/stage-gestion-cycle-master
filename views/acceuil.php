<?php
session_start();
include '../controllers/controleId.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/styleTest.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>GEM</title>
</head>
<body>
    <header>
        <div id="div-header">
            <h1><a href="acceuil.php">G.C.M  </a></h1>
            <span>: Gestion du cycle master</span>
        </div>
        <nav>
            <ul type="none">
                    <li>
                        <a href="AcceuilInsertionDonnee.php" title="Ajouter dans la base de données des modules, des matières etc...">Ajout.</a>
                    </li>
                    <li>
                        <a href="AcceuilSuppression.php" title="Supprimer dans la base de données des modules, des matières etc...">Suppression.</a>
                    </li>
                    <li>
                        <a href="AcceuilOrganisationDonnee.php" title="Pour pouvoir creer des interaction entre diverses entités">Organisation.</a>
                    </li>
                    <li>
                        <a href="mailto:bdiarra@insea.ac.ma" title="Nous envoyer un émail">Contact.</a>
                    </li>
                    <li>
                        <a href="../controllers/Deconnexion.php" title="Mettre fin a session">Deconnexion</a>
                    </li>
                </ul>
        </nav>
    </header>
    <section>
        <div id="div-gauche">
            <ul>
                <li>
                    
                    <a class="aChoix" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=etudiant">Etudiant</a>
                </li>
                <li>
                     <a class="aChoix" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=professeur">Professeur</a>
                </li>
                <li>
                     <a class="aChoix" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=coordinateur">Coordinateur</a>
                </li>
                <li>
                     <a class="aChoix" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=matiere">Matière</a>
                </li>
                <li>
                     <a class="aChoix" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=module">Module</a>
                </li>
            </ul>
        </div>
        <div id="div-droite">
            <?php 
                if(!isset($_GET['pageaffiche']))
                {
                    include 'ConsultationEtudiant.php';
                }
                if(isset($_GET['pageaffiche']) && $_GET['pageaffiche'] == 'etudiant')
                {
                    include 'ConsultationEtudiant.php';
                }
                if(isset($_GET['pageaffiche']) && $_GET['pageaffiche'] == 'matiere')
                {
                    include 'ConsultationMatiere.php';
                }
                if(isset($_GET['pageaffiche']) && $_GET['pageaffiche'] == 'module')
                {
                    include 'ConsultationModule.php';
                }
                if(isset($_GET['pageaffiche']) && $_GET['pageaffiche'] == 'professeur')
                {
                    include 'ConsultationProfesseur.php';
                }
                if(isset($_GET['pageaffiche']) && $_GET['pageaffiche'] == 'coordinateur')
                {
                    include 'ConsultationCoordinateur.php';
                }
             ?>
        </div>
    </section>
    <?php 
        include 'footer.php';
    ?>
</body>
</html>