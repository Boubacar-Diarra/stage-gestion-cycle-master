<?php

class ComposeManager{

    public static function getSemestre(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from semestre where semestre.numero = :numero');
        $reponse->execute(array('numero' => $donnee['numero']));
        return $reponse;
    }

    public static function getAU(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from anneeuniversitaire where annee = :annee');
        $reponse->execute(array('annee' => $donnee['annee']));
        return $reponse;
    }

    public static function getModule(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from module where module.intitule = :intitule');
        $reponse->execute(array('intitule' => $donnee['intitule']));
        return $reponse;
    }
}