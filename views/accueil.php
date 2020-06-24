<?php
session_start();
include '../controllers/controleId.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <title>GEM</title>
</head>
<body>

	<header>
		<h1>G.E.M</h1>
		<p>id & bdeconnexion</p>
	</header>
	<section>
		<div id="left-affiche-entite">
			<ul type="none" >
				<li><a href="../controllers/AfficheEtudiantController.php">Etudiant</a></li>
				<li><a href="">Professeur</a></li>
				<li><a href="">Coordinateur</a></li>
				<li><a href="">Module</a></li>
				<li><a href="">Matière</a></li>
			</ul>
	</div>
	<div id="right-affiche-info"></div>
	</section>
</body>
</html>