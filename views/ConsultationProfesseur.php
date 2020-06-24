<?php
//
//quelques variables de sessions pour les suppressions et la modification
$_SESSION['Sup'] = true;
header('Content-Type: text/html; charset=utf-8');
require_once '../models/ConnecToDataBase.php';
//on se connecte a la base de donnée
$db = ConnecToDataBase::connecToDataBaseName('gem');
//on defini le nombre de message par page
$nombreDeMessageParPage = 4;
//on recupere le nombre total de message
$donnee = $db->query('select count(*) as nb_message from professeur')->fetch();
$totalMessage = $donnee['nb_message'];
$nombreDePage = ceil($totalMessage/$nombreDeMessageParPage);
//on fait une boucle pour mettre un lien vers chacune de nos page
echo "Page : ";
for($i = 1; $i <= $nombreDePage; $i++)
{
    if($i != $nombreDePage)
        echo '<a class="pagination" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=professeur&page='. $i .'"> '. $i . ' </a> , ';
    else
        echo '<a class="pagination" href="http://localhost/gemProp/views/acceuil.php?pageaffiche=professeur&page='. $i .'"> '. $i . ' </a> .';
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
$reponse = $db->query('select * from professeur limit ' . $premierMessageAAfficher .',' .$nombreDeMessageParPage);
echo '        <table>
            <caption>Professeurs du cycle master</caption>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date Naissance</th>
                <th>Grade</th>
                <th>Specialité</th>
                <th>Departement</th>
                <th>Etablissement</th>
                <th>Actions</th>
            </tr>';
            $i = 2;
while($donnee = $reponse->fetch())
{       
        $i++;
        if($i%2 == 0)
        {
            echo '<tr>'.'<td>'.$donnee['cne'].'</td>'.'<td>'.$donnee['nom'].'</td>'.'<td>'.$donnee['prenom'].'</td>'.'<td>'.$donnee['dn'].'</td>'.'<td>'.$donnee['grade'].'</td>'.'<td>'.$donnee['specialite'].'</td>'.'<td>'.$donnee['departement'].'</td>'.'<td>'.$donnee['etablissement'].'</td>';
            echo '<td>
    <button>
        <a href="../views/ModifierProfesseur.php?cne='.$donnee['cne'].'&page='.$page.'"><img src="../public/image/modify.png" alt="édition" title="éditer" class="buttonAction"></a>
    </button>
    <button>
        <a href="../controllers/SuppressionProfesseur.php?cne='.$donnee['cne'].'"><img src="../public/image/delete.png" alt="supprimer" title="supprimer" class="buttonAction"></a>
    </button>
</td>';
            echo "</tr>";
        }
        else
        {
            echo '<tr class="ligne-noire">'.'<td>'.$donnee['cne'].'</td>'.'<td>'.$donnee['nom'].'</td>'.'<td>'.$donnee['prenom'].'</td>'.'<td>'.$donnee['dn'].'</td>'.'<td>'.$donnee['grade'].'</td>'.'<td>'.$donnee['specialite'].'</td>'.'<td>'.$donnee['departement'].'</td>'.'<td>'.$donnee['etablissement'].'</td>';
            echo '<td>
    <button>
        <a href="../views/ModifierProfesseur.php?cne='.$donnee['cne'].'&page='.$page.'"><img src="../public/image/modify.png" alt="édition" title="éditer" class="buttonAction"></a>
    </button>
    <button>
        <a href="../controllers/SuppressionProfesseur.php?cne='.$donnee['cne'].'" class="confirmSuppression"><img src="../public/image/delete.png" alt="supprimer" title="supprimer" class="buttonAction"></a>
    </button>
</td>';
            echo "</tr>";
        }
}
echo "</table>";
?>

<!--On inclu un script pour la gestion de la confirmation lors de la suppression d'un evenement-->
<script type="text/javascript" src="../public/js/ConfirmSuppression.js"></script>