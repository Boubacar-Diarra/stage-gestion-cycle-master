<?php

class EnseignerManager{

    public static function getMatiere(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from matiere where matiere.intitule = :intitule');
        $reponse->execute(array('intitule' => $donnee['intitule']));
        return $reponse;
    }
    public static function getAU(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from anneeuniversitaire where annee = :annee');
        $reponse->execute(array('annee' => $donnee['annee']));
        return $reponse;
    }

    public static function getProfesseur(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from professeur where professeur.cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
        return $reponse;
    }

}