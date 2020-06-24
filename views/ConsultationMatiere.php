<?php
//
header('Content-Type: text/html; charset=utf-8');
require_once '../models/ConnecToDataBase.php';
//on se connecte a la base de donnée
$db = ConnecToDataBase::connecToDataBaseName('gem');
//on defini le nombre de message par page
$nombreDeMessageParPage = 4;
//on recupere le nombre total de message
$donnee = $db->query('select count(*) as nb_message from matiere')->fetch();
$totalMessage = $donnee['nb_message'];
$nombreDePage = ceil($totalMessage/$nombreDeMessageParPage);
//on fait une boucle pour mettre un lien vers chacune de nos page
echo "Page : ";
for($i = 1; $i <= $nombreDePage; $i++)
{
    if($i != $nombreDePage)
        echo '<a class="pagination" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=matiere&='. $i .'"> '. $i . ' </a> , ';
    else
        echo '<a class="pagination" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=matiere&page='. $i .'"> '. $i . ' </a> .';
}
echo "<hr/>";
//on passe a l'affichage des donn╬ées relatives a la page
if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else $page = 1;
//on cherche le numero du premier message a afficher
$premierMessageAAfficher = ($page-1) * $nombreDeMessageParPage;
//on execute la valeur de la table correspondantes
$reponse = $db->query('select * from matiere limit ' . $premierMessageAAfficher .',' .$nombreDeMessageParPage);
echo '        <table>
            <caption>Matières du cycle master</caption>
            <tr>
                <th>Id</th>
                <th>Intitulé</th>
                <th>Volume Horaire Cours</th>
                <th>Nombre d\'évaluation</th>
                <th>Volume Horaire Td</th>
                <th>Volume Horaire Tp</th>
                <th>Activité Pratique</th>
                <th>Pourcentage de la Note</th>
                <th>Module</th>
            </tr>';
            $i = 2;
while($donnee = $reponse->fetch())
{       
        $i++;
        if($i%2 == 0)
        {
            $moduleResponse = $db->prepare("select * from module where id = :id");
            $moduleResponse->execute(array("id" => $donnee['idModule']));
            $donneeModule = $moduleResponse->fetch();
            echo '<tr>'.'<td>'.$donnee['id'].'</td>'.'<td>'.$donnee['intitule'].'</td>'.'<td>'.$donnee['volumeHoraireCours'].'</td>'.'<td>'.$donnee['nombreEvaluation'].'</td>'.'<td>'.$donnee['volumeHoraireTd'].'</td>'.'<td>'.$donnee['volumeHoraireTp'].'</td>'.'<td>'.$donnee['activitePratique'].'</td>'.'<td>'.$donnee['pourcentageNote'].'%</td>'.'<td>'.$donneeModule['intitule'].'</td>'.'</tr>';
        }
        else
        {
            $moduleResponse = $db->prepare("select * from module where id = :id");
            $moduleResponse->execute(array("id" => $donnee['idModule']));
            $donneeModule = $moduleResponse->fetch();
            echo '<tr class="ligne-noire">'.'<td>'.$donnee['id'].'</td>'.'<td>'.$donnee['intitule'].'</td>'.'<td>'.$donnee['volumeHoraireCours'].'</td>'.'<td>'.$donnee['nombreEvaluation'].'</td>'.'<td>'.$donnee['volumeHoraireTd'].'</td>'.'<td>'.$donnee['volumeHoraireTp'].'</td>'.'<td>'.$donnee['activitePratique'].'</td>'.'<td>'.$donnee['pourcentageNote'].'%</td>'.'<td>'.$donneeModule['intitule'].'</td>'.'</tr>'; 
        }
}
echo "</table>";
?>





