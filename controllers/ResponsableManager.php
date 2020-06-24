<?php

class ResponsableManager{

    public static function getModule(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from module where module.intitule = :intitule');
        $reponse->execute(array('intitule' => $donnee['intitule']));
        return $reponse;
    }

    public static function getAU(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from anneeuniversitaire where annee = :annee');
        $reponse->execute(array('annee' => $donnee['annee']));
        return $reponse;
    }
    
    public static function getCoordinateur(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from coordinateur where coordinateur.cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
        return $reponse;
    }
}