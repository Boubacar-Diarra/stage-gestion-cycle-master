<?php
session_start();
require_once  '../models/ConnecToDataBase.php';
require_once '../models/EtudierManager.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');
$donnee['cne'] = $_POST['choixEtudiant'];
$donnee['intitule'] = $_POST['choixModule'];
$donneeModule = EtudierManager::getModule($donnee, $db)->fetch();
$donneeEtudiant = EtudierManager::getEtudiant($donnee, $db)->fetch();
$reponseAu = EtudierManager::getAU($_POST, $db);

if(isset($donneeEtudiant['cne']) && isset($donneeModule['id']) && isset($_POST['annee'])){
    $tab = array('cne' => $donneeEtudiant['cne'], 'id' => $donneeModule['id'], 'annee' => $_POST['annee']);
    
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
    	ConnecToDataBase::inserAllInfoIntoEtudier($tab, $db);
    	//redirection
    	header('Location: ../views/OK.php');
    }
    else{
    	$_SESSION['OpOk'] = false;
    	header('Location: ../views/AffectModuleToEtudiant.php');
    }
}
else{
	$_SESSION['OpOk'] = false;
    header('Location: ../views/AffectModuleToEtudiant.php');
}