<?php
session_start();
require_once '../models/ResponsableManager.php';
require_once '../models/ConnecToDataBase.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');
$donnee['cne'] = $_POST['choixCoordinateur'];
$donnee['intitule'] = $_POST['choixModule'];
$donneeModule = ResponsableManager::getModule($donnee, $db)->fetch();
$donneeCoordinateur = ResponsableManager::getCoordinateur($donnee, $db)->fetch();
$reponseAu = ResponsableManager::getAU($_POST, $db);

if(isset($donneeCoordinateur['cne']) && isset($donneeModule['id'])  && isset($_POST['annee'])){
    $tab = array('cne' => $donneeCoordinateur['cne'], 'id' => $donneeModule['id'], 'annee' => $_POST['annee']);
    $estOk = false;
    //on verifier que l'annee existe
    while ($values = $reponseAu->fetch())
    {
    	if($values['annee'] == $_POST['annee'])
    	{
    		$estOk = true;
    		break;
    	}
    }
    if($estOk == true){
    	$_SESSION['OpOk'] = true;
    	//insersion de données
    	ConnecToDataBase::inserAllInfoIntoResponsable($tab, $db);
    	//redirection
    	header('Location: ../views/OK.php');
    }
    else{
    	$_SESSION['OpOk'] = false;
    	header('Location: ../views/AffectModuleToCoordinateur.php');
    }
}
else{
	$_SESSION['OpOk'] = false;
    header('Location: ../views/AffectModuleToCoordinateur.php');
}