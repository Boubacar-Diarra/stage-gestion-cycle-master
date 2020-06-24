<?php
require_once '../models/ConnecToDataBase.php';
require_once '../models/EtudiantManager.php';
 $db = ConnecToDataBase::connecToDataBaseName('gem');
 $reponse = EtudiantManager::getEtudiantAll($db);
 echo '<label for="choixEtudiant">Matricule, nom et prénom de l\'étudiant:</label>';
 echo '<select name="choixEtudiant" id="choixEtudiant">';
 while($donnee = $reponse->fetch()){
     //on crée la liste d'option qui devra etre affiché chez l'utilisateur
     echo '<option value="'.$donnee['cne'].'">'.$donnee['cne'].': '.$donnee['nom'].' '.$donnee['prenom'].' '.'</option>';
 }
 echo '</select>';
?>
