<?php
session_start();
require_once 'RegexManager.php';
require_once '../models/ConnecToDataBase.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');

    if(isset($_POST['annee']) && RegexManager::verifieAnnee($_POST['annee'])){
        ConnecToDataBase::insertAllInfoIntoAU($_POST, $db);
        $_SESSION['OpOk'] = true;
        header('Location: ../views/OK.php');
    }
    else{
    	$_SESSION['OpOk'] = false;
        header('Location: AUDataController.php');
    }
