<?php
session_start();
require_once '../models/ConnecToDataBase.php';
require_once '../models/AdminManager.php';

    $db = ConnecToDataBase::connecToDataBaseName('gem');
    $reponse = AdminManger::getAllInfo($db);
    $estAdmin = false;
    while($donnee = $reponse->fetch()){
        if($_POST['username'] == $donnee['username'] && $_POST['mdp'] == $donnee['mdp']){
            $_SESSION['username'] = $donnee['username'];
            $_SESSION['mdp'] = $donnee['mdp'];
            $estAdmin = true;
            break;
        }
    }
    if($estAdmin == false){
        header('Location: ../views/AdminLoginError.php');
    }
    else{
        header('Location: ../views/acceuil.php');
    }

