
<style>

:root {
    font-family: sans-serif;
    line-height: 1.2rem;
}
</style>
<h1><a href="index.php">Accueil</a> / <a href="byConsole.php?console=Toutes">Tri par console</a> / <a href="form_insert.php">Insérer un jeu</a></h1>


<?php

include "connexion.php";

///////////////////////
//VERSION NON PREPAREE

//récupération du paramètre GET
$id = $_GET['id'];

$statement = $pdo->query("SELECT * FROM `mes_jeux` WHERE id = ".$id);

//récupère le $result
$result = $statement->fetch(PDO::FETCH_ASSOC);

//affichage
echo 
'<br> Mon jeu numéro : '.$result['id'].
"<br> Nom : ".$result['nom'].
"<br> Sur console : ". $result['console'];



//////////////////
//VERSION PREPAREE

$sql = "SELECT * FROM mes_jeux WHERE id = :id";
$statement = $pdo->prepare($sql);

$statement->bindParam(':id', $id);

// $jeu = $statement->fetch(PDO::FETCH_ASSOC);
// $nom = $jeu['nom'];
// $console = $jeu['console'];
?>





