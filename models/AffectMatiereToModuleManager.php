<?php

class AffectMatiereToModuleManager{

    public static function getModule(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from module where module.intitule = :intitule');
        $reponse->execute(array('intitule' => $donnee['intituleModule']));
        return $reponse;
    }

    public static function getMatiere(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from matiere where matiere.intitule = :intitule');
        $reponse->execute(array('intitule' => $donnee['intituleMatiere']));
        return $reponse;
    }

    public static function updateMatiere(array $donnee ,PDO $db){
        $reponse = $db->prepare('update matiere set idModule = :idModule where id = :id');
        $reponse->execute(array('idModule' => $donnee['idModule'], 'id' => $donnee['id']));
    }
}