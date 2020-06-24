<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once 'RegexManager.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');

    if(isset($_POST['intitule']) && isset($_POST['departement']) && isset($_POST['nature'])  && isset($_POST['semestre']) && isset($_POST['objectif']) && isset($_POST['pre_requisPedagogique']) && isset($_POST['descriptif']))
    {
    	if(RegexManager::verifieIntitule($_POST['intitule']) && RegexManager::verifieString($_POST['departement']) && RegexManager::verifieString($_POST['nature']) && RegexManager::verifieString($_POST['objectif']) && RegexManager::verifieString($_POST['pre_requisPedagogique']) && RegexManager::verifieString($_POST['descriptif']) && (int)$_POST['semestre'] > 0)
    	{
            $_SESSION['OpOk'] = true;
			ConnecToDataBase::insertAllInfoIntoModule($_POST, $db);
            header('Location: ../views/OK.php');
    	}
    	else{
            $_SESSION['OpOk'] = false;
    		header('Location: ../views/FormulaireForCreateModule.php');
        }
    }
	else{
        $_SESSION['OpOk'] = false;
		header('Location: ../views/FormulaireForCreateModule.php');
    }
    