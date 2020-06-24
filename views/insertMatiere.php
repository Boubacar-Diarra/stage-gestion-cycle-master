<?php
require_once '../models/ConnecToDataBase.php';
require_once '../models/MatiereManager.php';
 $db = ConnecToDataBase::connecToDataBaseName('gem');
 $reponse = MatiereManager::getMatiereAll($db);
 echo '<label for="choixMatiere">Intitulé de la matière:</label>';
 echo '<select name="choixMatiere" id="choixMatiere">';
 while($donnee = $reponse->fetch()){
     //on crée la liste d'option qui devra etre affiché chez l'utilisateur
     echo '<option value="'.$donnee['intitule'].'">'.$donnee['intitule'].'</option>';
 }
 echo '</select>';
?>
