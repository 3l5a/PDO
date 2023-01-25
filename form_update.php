<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification d'un ancien jeu</title>
    <style>

:root {
    font-family: sans-serif;
    line-height: 1.2rem;
}
</style>
</head>

<body>
    <h1>Modification d'un jeu de la base</h1>
    <h2><a href="index.php">Accueil</a></h2>

    <?php
    include "connexion.php";

    $id = (int)$_GET['id'];

    $fetchGames = "SELECT * FROM mes_jeux";
    $statement = $pdo->query($fetchGames);

    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    //chercher le jeu dont l'id correspond pour pouvoir afficher ses infos dans les textareas
    foreach($result as $game)
    {
        if ($game['id'] == $id)
        {
            $nom = $game['nom'];
            $console = $game['console'];
        }
    }
    ?>

    </form>
    <br>
    <form action="" method="POST">
        <label for="nom">Modifier le nom :</label> <br>
        <input type="text" name="nom" id="nom" value="<?= $nom; ?>"> <br><br>

        <label for="console">et/ou modifier la console :</label><br>
        <input type="text" name="console" id="console" value="<?= $console; ?>">
        <input type="submit" value="Ok"> <br><br>
    </form>

    <?php

    //récupérer les nouvelles infos et update le jeu 
    $majNom = filter_input(INPUT_POST, 'nom');
    $majConsole = filter_input(INPUT_POST, 'console');

    if (isset($majNom) && !empty($majNom)
        && isset($majConsole) && !empty($majConsole)) 
        {


        $statement = $pdo->prepare('UPDATE mes_jeux SET nom = :nom, console = :console WHERE id= :id');

        $statement->bindParam(':console', $majConsole, PDO::PARAM_STR);
        $statement->bindParam(':nom', $majNom, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        $resultUpdate = $statement->execute();
        echo "Le jeu $majNom a été modifié avec succès";

        }else
        {
            echo "Veuillez modifier au moins un des deux champs";
        };
    ?>

</body>

</html>