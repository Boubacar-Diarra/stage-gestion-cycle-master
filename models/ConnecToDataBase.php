<?php
class ConnecToDataBase{
    public static function connecToDataBaseName($name){
        try {
            $dbconnection = new PDO('mysql:host=localhost;dbname='.$name, 'root', '');
        } catch (Exception $e) {
            die('Error: ' .$e->getMessage());
        }
        return $dbconnection;
    }

    //les methodes
    public static function insertAllInfoIntoSemestre(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into semestre (numero) values (:numero)');
        $reponse->execute(array('numero' => $donnee['numero']));
    }

    public static function insertAllInfoIntoAU(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into anneeuniversitaire (annee) values (:annee)');
        $reponse->execute(array('annee' => $donnee['annee']));
    }

    public static function insertAllInfoIntoCoordinateur(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into coordinateur (cne, nom, prenom, dn, grade, specialite, departement, etablissement) 
        values (:cne, :nom, :prenom, :dn, :grade, :specialite, :departement, :etablissement)');
        $reponse->execute(array('cne' => $donnee['cne'], 'nom' => $donnee['nom'], 'prenom' => $donnee['prenom'],
        'dn' => $donnee['dn'], 'grade' => $donnee['grade'], 'specialite' => $donnee['specialite'],'departement' => $donnee['departement'], 'etablissement' => $donnee['etablissement']));
    }

    public static function insertAllInfoIntoEtudiant(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into etudiant (cne, nom, prenom, dn, status) values (:cne, :nom,
        :prenom, :dn, :status)');
        $reponse->execute(array('cne' => $donnee['cne'], 'nom' => $donnee['nom'], 'prenom' => $donnee['prenom'],
        'dn' => $donnee['dn'], 'status' => $donnee['status']));
    }

    public static function insertAllInfoMatiere(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into matiere (intitule, volumeHoraireCours, nombreEvaluation, volumeHoraireTd, volumeHoraireTp, activitePratique, pourcentageNote) 
        values (:intitule, :volumeHoraireCours, :nombreEvaluation, :volumeHoraireTd, :volumeHoraireTp, :activitePratique, :pourcentageNote)');
        $reponse->execute(array( 'intitule' => $donnee['intitule'], 'volumeHoraireCours' => $donnee['volumeHoraireCours'],
        'nombreEvaluation' => $donnee['nombreEvaluation'], 'volumeHoraireTd' => $donnee['volumeHoraireTd'], 'volumeHoraireTp' => $donnee['volumeHoraireTp'],'activitePratique' => $donnee['activitePratique'], 'pourcentageNote' => $donnee['pourcentageNote']));
    }

    public static function insertAllInfoIntoModule(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into module (intitule, departement, nature, semestre, objectif, pre_requisPedagogique, descriptif) 
        values (:intitule, :departement, :nature, :semestre, :objectif, :pre_requisPedagogique, :descriptif)');
        $reponse->execute(array('intitule' => $donnee['intitule'], 'departement' => $donnee['departement'],
            'nature' => $donnee['nature'], 'semestre' => $donnee['semestre'], 
            'objectif' => $donnee['objectif'],'pre_requisPedagogique' => $donnee['pre_requisPedagogique'], 
            'descriptif' => $donnee['descriptif']));
    }

    public static function insertAllInfoIntoProfesseur(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into professeur (cne, nom, prenom, dn, grade, specialite, departement, etablissement) 
        values (:cne, :nom, :prenom, :dn, :grade, :specialite, :departement, :etablissement)');
        $reponse->execute(array('cne' => $donnee['cne'], 'nom' => $donnee['nom'], 'prenom' => $donnee['prenom'],
        'dn' => $donnee['dn'], 'grade' => $donnee['grade'], 'specialite' => $donnee['specialite'],'departement' => $donnee['departement'], 'etablissement' => $donnee['etablissement']));
    }

    public static function inserAllInfoIntoCompose(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into compose (annee, idModule, idSemestre) values (:annee, :idModule, :idSemestre)');
        $reponse->execute(array('annee' => $donnee['annee'], 'idModule' => $donnee['idModule'], 'idSemestre' => $donnee['idSemestre']));
    }

    public static function inserAllInfoIntoAppartenir(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into appartenir (annee, cneEtudiant, idSemestre) values (:annee, :cneEtudiant, :idSemestre)');
        $reponse->execute(array('annee' => $donnee['annee'], 'cneEtudiant' => $donnee['cneEtudiant'], 'idSemestre' => $donnee['idSemestre']));
    }

    public static function inserAllInfoIntoEnseigner(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into enseigner (annee, natureIntervention, cneProfesseur, idMatiere) values (:annee, :natureIntervention, :cneProfesseur, :idMatiere)');
        $reponse->execute(array('annee' => $donnee['annee'],'natureIntervention' => $donnee['natureIntervention'],'cneProfesseur' => $donnee['cneProfesseur'],'idMatiere' => $donnee['idMatiere']));
    }

    public static function inserAllInfoIntoResponsable(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into responsable (annee, cneCoordinateur, idModule) values (:annee, :cneCordinateur, :idModule)');
        $reponse->execute(array('cneCordinateur' => $donnee['cne'], 'annee' => $donnee['annee'], 'idModule' => $donnee['id']));
    }

    public static function inserAllInfoIntoEtudier(array $donnee, PDO $db){
        $reponse = $db->prepare('insert into etudier (annee, cneEtudiant, idModule) values (:annee, :cneEtudiant, :idModule)');
        $reponse->execute(array('cneEtudiant' => $donnee['cne'], 'annee' => $donnee['annee'], 'idModule' => $donnee['id']));
    }
}