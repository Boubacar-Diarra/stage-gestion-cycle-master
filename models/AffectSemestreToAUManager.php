<?php

class AffectSemestreToAU{

    public static function getSemestre(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from semestre where semestre.numero = :numero');
        $reponse->execute(array('numero' => $donnee['numero']));
        return $reponse;
    }

    public static function getAU(array $donnee, PDO $db){
        $reponse = $db->prepare('select * from anneeuniversitaire where anneeuniversitaire.annee = :annee');
        $reponse->execute(array('annee' => $donnee['annee']));
        return $reponse;
    }

    public static function updateSemestre(array $donnee ,PDO $db){
        $reponse = $db->prepare('update semestre set idAnnee = :idAnnee where id = :id');
        $reponse->execute(array('idAnnee' => $donnee['idAnnee'], 'id' => $donnee['id']));
    }
}