<?php
class EtudiantManager{
    public static function getEtudiantAll(PDO $db){
        $reponse = $db->query('select * from etudiant');
        return $reponse;
    }
    public static function updateEtudiant(array $donnee, PDO $db){
    	$reponse = $db->prepare('update etudiant set cne = :cne, nom = :nom, prenom = :prenom, dn = :dn, status = :status where cne = \''. $donnee['cne'].'\'');
    	$reponse->execute(array('cne' => $donnee['cne'], 'nom' => $donnee['nom'], 'prenom' => $donnee['prenom'],'dn' => $donnee['dn'], 'status' => $donnee['status']));
    }
    public static function deleteEtudiant(array $donnee ,PDO $db){
        $reponse = $db->prepare('delete from etudiant where cne = :cne');
        $reponse->execute(array('cne' => $donnee['cne']));
    }
}