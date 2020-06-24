<?php
    session_start();
    require_once '../models/ConnecToDataBase.php';
    require_once '../models/ProfesseurManager.php';
    require_once '../controllers/RegexManager.php';
    //cette variable nous permettra de savoir quel controlleur appellé dans SaisieCne...
    
    $db = ConnecToDataBase::connecToDataBaseName('gem');
    if(RegexManager::verifieCne($_POST['cne']))
    {
        ProfesseurManager::deleteProfesseur($_POST, $db);
        $_SESSION['Sup'] = false;
        $_SESSION['OpOk'] = true;
        header('Location: ../views/OK.php');
    }
    else{
        $_SESSION['Sup'] = true;
        $_SESSION['OpOk'] = false;
        header('Location: ../views/SaisieCneProfesseur.php');
    }
?>