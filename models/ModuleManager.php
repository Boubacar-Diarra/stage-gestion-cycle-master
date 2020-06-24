<?php
class ModuleManager{
    public static function getModuleAll(PDO $db){
        $reponse = $db->query('select * from module');
        return $reponse;
    }
}