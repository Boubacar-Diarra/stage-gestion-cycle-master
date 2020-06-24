<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once '../models/AffectSemestreToAUManager.php';

$db = ConnecToDataBase::connecToDataBaseName('gem');

$donneeSemestre = AffectSemestreToAU::getSemestre($_POST, $db)->fetch();
$donneeAU = AffectSemestreToAU::getAU($_POST, $db)->fetch();

if(isset($donneeAU['id']) && isset($donneeSemestre['id']) && isset($_POST['annee'])){
    $tab = array('idAnnee' => $donneeAU['id'], 'id' => $donneeSemestre['id']);
    $_SESSION['OpOk'] = true;
    //mise a jour des données
    AffectSemestreToAU::updateSemestre($tab, $db);
    //redirection
    header('Location: ../views/OK.php');
}
else{
	$_SESSION['OpOk'] = false;
    header('Location: ../views/AffectSemestreToAU.php');
}