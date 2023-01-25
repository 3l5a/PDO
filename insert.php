<title>insert.php</title>

<?php


include "connexion.php";


// $sql = "INSERT INTO `mes_jeux` (`nom`, `console`) VALUES ('Skyrim', 'PS4')";

// $sql = "DELETE FROM `mes_jeux` WHERE nom = 'Skyrim'";

// $nom = 'Diablo III';
// $console = 'PS4';

// $sql = "INSERT INTO `mes_jeux` (`nom`, `console`) VALUES (' ".$nom. " ', ' ".$console."')";

// $statement = $pdo->query($sql);


//CREATION / INSERTION D'UN JEU (p17 du TP)
$newGame = filter_input(INPUT_POST, 'jeu');
$newConsole = filter_input(INPUT_POST, 'console');
// var_dump($newGame);



/////// TEXTE A TROU ////////

$sql = "INSERT INTO mes_jeux (nom, console) VALUES (:nom, :console)";
$statement = $pdo->prepare($sql);

$statement->bindParam(':nom', $newGame, PDO::PARAM_STR);
$statement->bindParam(':console', $newConsole, PDO::PARAM_STR);

$result = $statement->execute();
echo "<br>";
var_dump($result); //booléen true si bien executé
echo $pdo->lastInsertId(); //checker la derniere ligne ajoutée
