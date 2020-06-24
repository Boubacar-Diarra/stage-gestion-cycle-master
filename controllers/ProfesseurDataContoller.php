<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once 'RegexManager.php';
require_once '../models/ProfesseurManager.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');
    if(isset($_SESSION['addP']) && $_SESSION['addP'] == true)
    {
        $_SESSION['addP'] = false;
        if(isset($_POST['cne']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['grade']) && isset($_POST['specialite']) && isset($_POST['departement']) && isset($_POST['etablissement']))
        {
            if(RegexManager::verifieCne($_POST['cne']) && RegexManager::verifieNom($_POST['nom']) && RegexManager::verifiePrenom($_POST['prenom']) && RegexManager::verifieDn($_POST['dn']) && RegexManager::verifieString($_POST['grade']) && RegexManager::verifieString($_POST['specialite']) && RegexManager::verifieString($_POST['departement']) && RegexManager::verifieString($_POST['etablissement']))
            {
                $_SESSION['OpOk'] = true;
                ConnecToDataBase::insertAllInfoIntoProfesseur($_POST, $db);
                header('Location: ../views/OK.php');
            }
            else{
                $_SESSION['OpOk'] = false;
                header('Location: ../views/FormulaireForCreateProfesseur.php');
            }
        }
        else{
            $_SESSION['OpOk'] = false;
            header('Location: ../views/FormulaireForCreateProfesseur.php');
        }
    }
    if(isset($_SESSION['updateP']) && $_SESSION['updateP'] == true){
        $_SESSION['updateP'] = false;
        if(isset($_POST['cne']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['dn']) && isset($_POST['grade']) && isset($_POST['specialite']) && isset($_POST['departement']) && isset($_POST['etablissement']))
        {
            if(RegexManager::verifieCne($_POST['cne']) && RegexManager::verifieNom($_POST['nom']) && RegexManager::verifiePrenom($_POST['prenom']) && RegexManager::verifieDn($_POST['dn']) && RegexManager::verifieString($_POST['grade']) && RegexManager::verifieString($_POST['specialite']) && RegexManager::verifieString($_POST['departement']) && RegexManager::verifieString($_POST['etablissement']))
            {
                $_SESSION['OpOk'] = true;
                ProfesseurManager::updateProfesseur($_POST, $db);
                header('Location: ../views/OK.php');
            }
            else{
                $_SESSION['OpOk'] = false;
                header('Location: ../views/SaisieCneProfesseur.php');
            }
        }
        else{
            $_SESSION['OpOk'] = false;
            header('Location: ../views/SaisieCneProfesseur.php');
        }

    }