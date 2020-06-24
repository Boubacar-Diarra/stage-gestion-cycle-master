<?php
class CoordinateurManager{
    public static function getCoordinateur(PDO $db){
        $reponse = $db->query('select * from coordinateur');
        return $reponse;
    }
    public static function updateCoordinateur(array $donnee, PDO $db){
    	$reponse = $db->prepare('update coordinateur set cne = :cne, nom = :nom, prenom = :prenom, dn = :dn, grade = :grade, specialite = :specialite, departement =:departement, etablissement =:etablissement where cne = \''. $donnee['cne'].'\'');
    	$reponse->execute(array('cne' => $donnee['cne'], 'nom' => $donnee['nom'], 'prenom' => $donnee['prenom'],
        'dn' => $donnee['dn'], 'grade' => $donnee['grade'], 'specialite' => $donnee['specialite'],'departement' => $donnee['departement'], 'etablissement' => $donnee['etablissement']));
    }
    public static function deleteCoordinateur(array $donnee ,PDO $db){
        $reponse = $db->prepare('delete from coordinateur where cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
    }
}