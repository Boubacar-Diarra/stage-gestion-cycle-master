<?php

class AdminManger{

    //methodes
    public static function getAllInfo(PDO $db){
        return $db->query('select * from admin');
    }
}