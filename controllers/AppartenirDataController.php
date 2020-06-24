<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once '../models/AppartenirManager.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');

$donnee['cne'] = $_POST['choixEtudiant'];
$reponseEtudiant = AppartenirManager::getEtudiant($donnee, $db);
$reponseSemestre = AppartenirManager::getSemestre($_POST, $db);
$reponseAu = AppartenirManager::getAU($_POST, $db);

$donneeEtudiant = $reponseEtudiant->fetch();
$donneeSemestre = $reponseSemestre->fetch();

if(isset($donneeEtudiant['cne']) && isset($donneeSemestre['id']) && isset($_POST['annee'])){

    $tab = array('cneEtudiant' => $donneeEtudiant['cne'], 'idSemestre' => $donneeSemestre['id'], 'annee' => $_POST['annee']);
    
    $estOk = false;
    while($values = $reponseAu->fetch())
    {
        if($values['id'] == $donneeSemestre['idAnnee'])
        {
            $estOk = true;
            break;
        }
    }
    if($estOk == true)
    {
        $_SESSION['OpOk'] = true;
        //insertion des donnée
        ConnecToDataBase::inserAllInfoIntoAppartenir($tab, $db);
    //redirection
        header('Location: ../views/OK.php');
    }
    else
    {
        $_SESSION['OpOk'] = false;
        header('Location: ../views/AffectEtudiantToSemestre.php');
    }
}
else{
	$_SESSION['OpOk'] = false;
    //redirection
    header('Location: ../views/AffectEtudiantToSemestre.php');
}
