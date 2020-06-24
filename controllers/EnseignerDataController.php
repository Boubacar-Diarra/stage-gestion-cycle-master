<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once '../models/EnseignerManager.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');
$donnee['cne'] = $_POST['choixProfesseur'];
$donnee['intitule'] = $_POST['choixMatiere'];
$reponseMatiere = EnseignerManager::getMatiere($donnee, $db);
$reponseProfesseur = EnseignerManager::getProfesseur($donnee, $db);
$reponseAu = EnseignerManager::getAU($_POST, $db);

$donneeMatiere = $reponseMatiere->fetch();
$donneeProfesseur = $reponseProfesseur->fetch();

if(isset($donneeMatiere['id']) && isset($donneeProfesseur['cne']) && isset($_POST['annee']) && isset($_POST['natureIntervention']))
{
    $tab = array('idMatiere' => $donneeMatiere['id'], 'cneProfesseur' => $donneeProfesseur['cne'], 'annee' => $_POST['annee'],'natureIntervention' => $_POST['natureIntervention']);
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
    	ConnecToDataBase::inserAllInfoIntoEnseigner($tab, $db);
    	//redirection
    	header('Location: ../views/OK.php');
    }
    else{
    	$_SESSION['OpOk'] = false;
    	header('Location: ../views/AffectMatiereToProfesseur.php');
    }
}
else{
	$_SESSION['OpOk'] = false;
    header('Location: ../views/AffectMatiereToProfesseur.php');
}