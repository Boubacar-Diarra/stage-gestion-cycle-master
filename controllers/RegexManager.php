<?php
class RegexManager{
    //attributs
    private static $nomRegex = '#^[A-Z]{1}[-a-zA-Z\s]+$#';
    private static $prenomRegex = '#^[A-Z]{1}[-a-zA-Z\s]+$#';
        //pour l'instant j'accepte toutes les entrées, en attendant d'avoir tous les outils en main
    private static $cneRegex = "#.+#";
    private static $dnRegex = '#^[0-9]{2}/[0-9]{2}/[0-9]{4}$#';
    private static $intituleRegex = '#^[A-Z]{1}[a-zA-Z1-9\s]+$#';
    private static $statusRegex = '#^[A-Z0-9]{1}[a-zA-Z\s]+$#';
    private static $stringRegex = '#^[-A-Z1-9]{1}[-,\'a-zA-Z1-9\s]+$#';
    private static $anneeRegex = '#^2[0-9]{3}/2[0-9]{3}$#';
    private static $volumeHoraire = '#^[0-9]{1,2}$#';
    private static $pourcentageRegex = '#^[0-9]{1,3}\.[0-9]{0,2}$#';

    //methodes
    public static function verifieNom($nom){
        return preg_match(self::$nomRegex,$nom);
    }

    public static function verifiePrenom($prenom){
        return preg_match(self::$prenomRegex,$prenom);
    }

    public static function verifieCne($cne){
        return preg_match(self::$cneRegex, $cne);
    }

    public static function verifieDn($dn){
        //a modifier after, afin de trouver une verification fiablde de cette date
        return true;
    }

    public static function verifieIntitule($intitule){
        return preg_match(self::$intituleRegex,$intitule);
    }

    public static function verifieStatus($s){
        return preg_match(self::$statusRegex,$s);
    }

    public static function verifieString($s){
        return preg_match(self::$stringRegex,$s);
    }

    public static function verifieAnnee($s){
        return preg_match(self::$anneeRegex,$s);
    }

    public static function verifieVolumeHoraire($s){
        return preg_match(self::$volumeHoraire,$s);
    }

    public static function verifiePourcentage($s){
        return preg_match(self::$pourcentageRegex,$s);
    }
}