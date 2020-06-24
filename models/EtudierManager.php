<?php

class EtudierManager{

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
    
    public static function getEtudiant(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from etudiant where etudiant.cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
        return $reponse;
    }
}