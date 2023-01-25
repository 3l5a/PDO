<?php
include "connexion.php";

$jeu = $_GET['id'];
$statement = $pdo->prepare("DELETE FROM mes_jeux WHERE id = :id");

$statement->bindParam(':id', $jeu);

$statement->execute();

$sql = "SELECT * FROM mes_jeux";
$statement = $pdo->query($sql);

$games = $statement->fetchAll(PDO::FETCH_ASSOC);

if ((isset($jeu)) && !empty($jeu))
{
    echo $games[$jeu]['nom'] ." a été supprimé avec succès";
} else
{
    echo "Ce jeu n'existait pas de toute façon...";
} ;



