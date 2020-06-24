<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once 'RegexManager.php';
require_once '../models/EtudiantManager.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');
    if(isset($_SESSION['addE']) && $_SESSION['addE'] == true)
    {
        if(isset($_POST['cne']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['status']))
        {
            if(RegexManager::verifieCne($_POST['cne']) && RegexManager::verifieNom($_POST['nom']) && RegexManager::verifiePrenom($_POST['prenom']) &&RegexManager::verifieDn($_POST['dn']) && RegexManager::verifieStatus($_POST['status']))
            {	
                $_SESSION['OpOk'] = true;
                ConnecToDataBase::insertAllInfoIntoEtudiant($_POST, $db);
                header('Location: ../views/OK.php');
            }
            else{
                $_SESSION['OpOk'] = false;
                header('Location: ../views/FormulaireForCreateEtudiant.php');
            }
        }
        else{
            $_SESSION['OpOk'] = false;
            header('Location: ../views/FormulaireForCreateEtudiant.php');
        }    
    }
    if(isset($_SESSION['updateE']) && $_SESSION['updateE'] == true){
        if(isset($_POST['cne']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['status']))
        {
            if(RegexManager::verifieCne($_POST['cne']) && RegexManager::verifieNom($_POST['nom']) && RegexManager::verifiePrenom($_POST['prenom']) &&RegexManager::verifieDn($_POST['dn']) && RegexManager::verifieStatus($_POST['status']))
            {	
                $_SESSION['OpOk'] = true;
                EtudiantManager::updateEtudiant($_POST, $db);
                header('Location: ../views/OK.php');
            }
            else{
                $_SESSION['OpOk'] = false;
                header('Location: ../views/FormulaireForCreateEtudiant.php');
            }
        }
        else{
            $_SESSION['OpOk'] = false;
            header('Location: ../views/FormulaireForCreateEtudiant.php');
        }  
    }
    