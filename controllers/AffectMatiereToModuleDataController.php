<?php
session_start();
require_once '../models/AffectMatiereToModuleManager.php';
require_once '../models/ConnecToDataBase.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');

$donnee['intituleMatiere'] = $_POST['choixMatiere'];
$donnee['intituleModule'] = $_POST['choixModule'];
$reponseMatiere = AffectMatiereToModuleManager::getMatiere($donnee, $db);
$reponseModule = AffectMatiereToModuleManager::getModule($donnee, $db);

$donneeMatiere = $reponseMatiere->fetch();
$donneModule = $reponseModule->fetch();

if(isset($donneeMatiere['id']) && isset($donneModule['id'])){
    $tab = array('id' => $donneeMatiere['id'], 'idModule' => $donneModule['id']);
    //
    $_SESSION['OpOk'] = true;
    //mise a jour des données
    AffectMatiereToModuleManager::updateMatiere($tab, $db);

    //redirection
    header('Location: ../views/Ok.php');
}
else{
	$_SESSION['OpOk'] = false;
    header('Location: ../views/AffectMatiereToModule.php');
}