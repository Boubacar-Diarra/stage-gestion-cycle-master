<?php
//
header('Content-Type: text/html; charset=utf-8');
require_once '../models/ConnecToDataBase.php';
//on se connecte a la base de donnée
$db = ConnecToDataBase::connecToDataBaseName('gem');
//on defini le nombre de message par page
$nombreDeMessageParPage = 4;
//on recupere le nombre total de message
$donnee = $db->query('select count(*) as nb_message from module')->fetch();
$totalMessage = $donnee['nb_message'];
$nombreDePage = ceil($totalMessage/$nombreDeMessageParPage);
//on fait une boucle pour mettre un lien vers chacune de nos page
echo "Page : ";
for($i = 1; $i <= $nombreDePage; $i++)
{
    if($i != $nombreDePage)
        echo '<a class="pagination" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=module&page='. $i .'"> '. $i . ' </a> , ';
    else
        echo '<a class="pagination" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=module&page='. $i .'"> '. $i . ' </a> .';
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
$reponse = $db->query('select * from module limit ' . $premierMessageAAfficher .',' .$nombreDeMessageParPage);
/**
 * 
*<th>Pre-requis Pedagogique</th>
*<th>Descriptif</th>
*'<td>'.$donnee['pre_requisPedagogique'].'</td>'.'<td>'.$donnee['descriptif'].'</td>'.
 */
echo '        <table>
            <caption>Modules du cycle master</caption>
            <tr>
                <th>Id</th>
                <th>Intitulé</th>
                <th>Département</th>
                <th>Nature</th>
                <th>Semestre</th>
                <th>Objectif</th>
            </tr>
';
            $i = 2;
while($donnee = $reponse->fetch())
{       
        $i++;
        if($i%2 == 0)
        {
            echo '<tr>'.'<td>'.$donnee['id'].'</td>'.'<td>'.$donnee['intitule'].'</td>'.'<td>'.$donnee['departement'].'</td>'.'<td>'.$donnee['nature'].'</td>'.'<td>'.$donnee['semestre'].'</td>'.'<td>'.$donnee['objectif'].'</td>'.'</tr>';
        }
        else
        {
            echo '<tr class="ligne-noire">'.'<td>'.$donnee['id'].'</td>'.'<td>'.$donnee['intitule'].'</td>'.'<td>'.$donnee['departement'].'</td>'.'<td>'.$donnee['nature'].'</td>'.'<td>'.$donnee['semestre'].'</td>'.'<td>'.$donnee['objectif'].'</td>'.'</tr>';
        }
}
echo "</table>";
?>