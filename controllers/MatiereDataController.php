<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once 'RegexManager.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');

    if(isset($_POST['intitule']) && isset($_POST['volumeHoraireCours']) && isset($_POST['volumeHoraireTd'])  && isset($_POST['volumeHoraireTp']) && isset($_POST['nombreEvaluation']) && isset($_POST['activitePratique']) && isset($_POST['pourcentageNote']))
    {
    	if(RegexManager::verifieIntitule($_POST['intitule']) && RegexManager::verifieVolumeHoraire($_POST['volumeHoraireCours']) && RegexManager::verifieVolumeHoraire($_POST['volumeHoraireTd']) && RegexManager::verifieVolumeHoraire($_POST['volumeHoraireTp']) && RegexManager::verifiePourcentage($_POST['pourcentageNote']) && RegexManager::verifieString($_POST['activitePratique']) && (int)$_POST['nombreEvaluation'] > 0)
    	{
            $_SESSION['OpOk'] = true;
    		ConnecToDataBase::insertAllInfoMatiere($_POST, $db);
            header('Location: ../views/OK.php');
    	}
    	else{
            $_SESSION['OpOk'] = false;
    		header('Location: ../views/FormulaireForCreateMatiere.php');
        }
    }
    else{
        $_SESSION['OpOk'] = false;
    	header('Location: ../views/FormulaireForCreateMatiere.php');
    }
