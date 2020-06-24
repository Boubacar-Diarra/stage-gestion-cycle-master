<?php
class MatiereManager{
    public static function getMatiereAll(PDO $db){
        $reponse = $db->query('select * from matiere');
        return $reponse;
    }
}