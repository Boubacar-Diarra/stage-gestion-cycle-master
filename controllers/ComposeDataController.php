<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once '../models/ComposeManager.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');

$donnee['intitule'] = $_POST['choixModule'];
$reponseModule = ComposeManager::getModule($donnee, $db);
$reponseSemestre = ComposeManager::getSemestre($_POST, $db);
$reponseAu = ComposeManager::getAU($_POST, $db);

$donneeModule = $reponseModule->fetch();
$donneeSemestre = $reponseSemestre->fetch();

//on verifie les informations reçus
if(isset($donneeModule['id']) && isset($donneeSemestre['id']) && isset($_POST['annee'])){
    $tab = array('annee' => $_POST['annee'], 'idModule' => $donneeModule['id'], 'idSemestre' =>  $donneeSemestre['id']);
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
        ConnecToDataBase::inserAllInfoIntoCompose($tab, $db);
        header('Location: ../views/OK.php');
    }
    else
    {
    	$_SESSION['OpOk'] = false;
		header('Location: ../views/AffectModuleToSemestre.php');
    }
    
}
else
{
	$_SESSION['OpOk'] = false;
	header('Location: ../views/AffectModuleToSemestre.php');
}
    
    