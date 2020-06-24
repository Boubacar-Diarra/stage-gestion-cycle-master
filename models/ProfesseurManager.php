<?php
class ProfesseurManager{
    public static function getProfesseurAll(PDO $db){
        $reponse = $db->query('select * from professeur');
        return $reponse;
    }

    public static function updateProfesseur(array $donnee, PDO $db){
    	$reponse = $db->prepare('update professeur set cne = :cne, nom = :nom, prenom = :prenom, dn = :dn, grade = :grade, specialite = :specialite, departement =:departement, etablissement =:etablissement where cne = \''. $donnee['cne'].'\'');
    	$reponse->execute(array('cne' => $donnee['cne'], 'nom' => $donnee['nom'], 'prenom' => $donnee['prenom'],
        'dn' => $donnee['dn'], 'grade' => $donnee['grade'], 'specialite' => $donnee['specialite'],'departement' => $donnee['departement'], 'etablissement' => $donnee['etablissement']));
    }
    public static function deleteProfesseur(array $donnee ,PDO $db){
        $reponse = $db->prepare('delete from professeur where cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
    }
}