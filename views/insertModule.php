<?php
require_once '../models/ConnecToDataBase.php';
require_once '../models/ModuleManager.php';
 $db = ConnecToDataBase::connecToDataBaseName('gem');
 $reponse = ModuleManager::getModuleAll($db);
 echo '<label for="choixModule">Intitulé du Module:</label>';
 echo '<select name="choixModule" id="choixModule">';
 while($donnee = $reponse->fetch()){
     //on crée la liste d'option qui devra etre affiché chez l'utilisateur
    echo '<option value="'.$donnee['intitule'].'">'.$donnee['intitule'].'</option>';
 }
 echo '</select>';
?>
