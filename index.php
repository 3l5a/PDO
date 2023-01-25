<style>

:root {
    font-family: sans-serif;
    line-height: 1.2rem;
}
</style>

<title>index.php</title>

<?php

include "connexion.php";



$statement = $pdo->query("SELECT * FROM mes_jeux"); //récupère un objet PDO statement


// $result = $statement->fetch();
// var_dump($result);
// echo "<br>";
// echo "<br>";
// echo "Var_dump de nom :<br> ";
// var_dump($nom);

$resultAll = $statement->fetchAll();

// echo "<br>";
// echo "<br>";
// var_dump(gettype(($resultAll)));

// echo "<br>";
// echo "<br>";
// echo "<br> Méthode fetchAll(), array de la table : <br>";
// var_dump($resultAll);
echo '<h1><a href="index.php">Accueil</a> / <a href="byConsole.php?console=Toutes">Tri par console</a> / <a href="form_insert.php">Insérer un jeu</a></h1>';


echo "<br>";
echo "<br>";
echo "Ma liste de jeux vidéo :";
foreach($resultAll as $key => $value)
{
    echo "<li>".$value['nom']." sur ".$value['console']."<br> ";
    ?> <a href="showOne.php?id=<?= $value['id'] ?>">Voir ce jeu en détails</a> / 
    <a href="delete.php?id=<?= $value['id'] ?>" style="color: red;">Supprimer</a> /  <!-- récupéré de showOne.php -->
    <a href="form_update.php?id= <?= $value['id']; ?>" style="color: green;">Modifier</a><br> <br><?php 
};

echo "<br>";
echo "<br>";

echo "Afficher le résultat de la requête sous forme de tableau associatif indexé par les noms des colonnes : <br><br>";

$statement2 = $pdo->query("SELECT * FROM mes_jeux");
$result = $statement2->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);
echo"<br>";
echo"<br>";

?>
