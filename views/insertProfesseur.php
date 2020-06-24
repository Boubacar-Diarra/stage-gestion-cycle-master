<?php
require_once '../models/ConnecToDataBase.php';
require_once '../models/ProfesseurManager.php';
 $db = ConnecToDataBase::connecToDataBaseName('gem');
 $reponse = ProfesseurManager::getProfesseurAll($db);
 echo '<label for="choixProfesseur">Matricule, nom et prénom du professeur:</label>';
 echo '<select name="choixProfesseur" id="choixProfesseur">';
 while($donnee = $reponse->fetch()){
     //on crée la liste d'option qui devra etre affiché chez l'utilisateur
     echo '<option value="'.$donnee['cne'].'">'.$donnee['cne'].': '.$donnee['nom'].' '.$donnee['prenom'].' '.'</option>';
 }
 echo '</select>';
?>
