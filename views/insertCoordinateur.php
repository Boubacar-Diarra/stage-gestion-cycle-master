<?php
require_once '../models/ConnecToDataBase.php';
require_once '../models/CoordinateurManager.php';
 $db = ConnecToDataBase::connecToDataBaseName('gem');
 $reponse = CoordinateurManager::getCoordinateur($db);
 echo '<label for="choixCoordinateur">Matricule, nom et prénom du coordinateur:</label>';
 echo '<select name="choixCoordinateur" id="choixCoordinateur">';
 while($donnee = $reponse->fetch()){
     //on crée la liste d'option qui devra etre affiché chez l'utilisateur
     echo '<option value="'.$donnee['cne'].'">'.$donnee['cne'].': '.$donnee['nom'].' '.$donnee['prenom'].' '.'</option>';
 }
 echo '</select>';
?>
