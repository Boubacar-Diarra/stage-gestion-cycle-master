<?php
    session_start();
    require_once '../models/ConnecToDataBase.php';
    require_once '../models/CoordinateurManager.php';
    require_once '../controllers/RegexManager.php';
    //cette variable nous permettra de savoir quel controlleur appellé dans SaisieCne...

    $db = ConnecToDataBase::connecToDataBaseName('gem');
    if(RegexManager::verifieCne($_GET['cne']))
    {
        $_SESSION['Sup'] = false;
        CoordinateurManager::deleteCoordinateur($_GET, $db);
        $_SESSION['OpOk'] = true;
        header('Location: ../views/OK.php');
    }
    else{
        $_SESSION['Sup'] = true;
        $_SESSION['OpOk'] = false;
        header('Location: ../views/SaisieCneCoordinateur.php');
    }
?>