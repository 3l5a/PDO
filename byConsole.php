<style>
    :root {
        font-family: sans-serif;
        line-height: 1.2rem;
    }
</style>
<title>byConsole.php</title>
<h1><a href="index.php">Accueil</a></h1>
<?php

include "connexion.php";

$statementPS4 = $pdo->query("SELECT * FROM mes_jeux WHERE console = 'PS4' ORDER BY nom");
$resultPS4 = $statementPS4->fetchAll(PDO::FETCH_ASSOC);


$statementSwitch = $pdo->query("SELECT * FROM mes_jeux WHERE console = 'Switch' ORDER BY nom");
$resultSwitch = $statementSwitch->fetchAll(PDO::FETCH_ASSOC);


$statementXbox = $pdo->query("SELECT * FROM mes_jeux WHERE console = 'Xbox series X' ORDER BY nom");
$resultXbox = $statementXbox->fetchAll(PDO::FETCH_ASSOC);


$statementToutes = $pdo->query("SELECT * FROM mes_jeux ORDER BY nom");
$resultToutes = $statementToutes->fetchAll(PDO::FETCH_ASSOC);

//liens vers les jeux d'une console :
$selectConsoles = $pdo->query("SELECT DISTINCT console FROM mes_jeux"); 
$resultConsoles = $selectConsoles->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultConsoles as $games) //nav lien pour chaque console
{
?>
    <a href="byConsole.php?console=<?= $games['console'] ?>">Tous les jeux <?= $games['console'] ?></a>
<?php
    echo "<br>";
}

//lien toutes les consoles :
function afficheParConsole(array $arr) //array des jeux d'une console ($resultPS4, $resultSwitch, etc)
{
    foreach ($arr as $key => $gameInfo) {
        echo "<br>";
        echo "Jeu n°" . $gameInfo['id'] . ", " . $gameInfo['nom'] . " sur " . $gameInfo['console'];
    }
};
?>

<a href="byConsole.php?console=<?= "Toutes" ?>">Tous les jeux</a>


<?php

$console = filter_input(INPUT_GET, 'console');

if ($console == 'PS4') {
    echo "<br>";
    afficheParConsole($resultPS4);
} elseif ($console == 'Switch') {
    echo "<br>";
    afficheParConsole($resultSwitch);
} elseif ($console == 'Xbox series X') {
    echo "<br>";
    afficheParConsole($resultXbox);
} else if ($console == 'Toutes') {
    echo "<br>";
    afficheParConsole($resultToutes);
} else {
    echo "<br>";
    echo "<br>Aucun jeu sur cette console";
}
