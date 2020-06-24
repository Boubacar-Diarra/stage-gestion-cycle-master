<?php

class AppartenirManager{

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

    public static function getEtudiant(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from etudiant where etudiant.cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
        return $reponse;
    }
}