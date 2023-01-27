<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion d'un jeu</title>
</head>

<body>
    <h2><a href="index.php">Accueil</a></h2>

    <h1>Insertion de jeu :</h1>

    <form action="form_insert.php" method="POST">
        <label for="game">Nom du jeu<input type="text" name="jeu" id="jeu"></label> <br>
        <label for="console">Nom de la console<input type="text" name="console" id="console"></label> <br>
        <input type="submit" value="Ok">

    </form>

    <?php
    include "insert.php";
    if (
        isset($newGame) && !empty($newGame)
        && isset($newConsole) && !empty($newConsole)
    ) {
        
        $result = $statement->execute(); // récupérat° de insert.php / sinon erreur avant d'entrer un jeu car la page essaie d'afficher un jeu pas encore entré
        echo "Le jeu $newGame a été ajouté avec succès";
    } else {
        echo "Veuillez ajouter un jeu";
    };

    ?>
</body>

</html>