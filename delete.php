<style>
:root {
    font-family: sans-serif;
    line-height: 1.2rem;
}
</style>
<h1><a href="index.php">Accueil</a></h1>

<?php
include "connexion.php";

$jeu = (int)filter_input(INPUT_GET,'id');

// affichage du message
// aller chercher le n° de clé dont 'id' = $jeu (id du jeu) et afficher son nom


$indexOfGameQuery = "SELECT nom FROM mes_jeux WHERE id= :jeu";
$statement2 = $pdo->prepare($indexOfGameQuery);
$statement2->bindParam(':jeu', $jeu, PDO::PARAM_STR);

$result = $statement2->fetch(PDO::FETCH_ASSOC);
echo "Vous avez bien supprimé ". $result['nom'];


// suppression du jeu
/**
 * Undocumented function
 *
 * @param pdo $pdo1
 * @param integer $id
 * @return void
 */
function suppr(pdo $pdo1, int $id){
$statement = $pdo1->prepare("DELETE FROM mes_jeux WHERE id = :id");
$statement->bindParam(':id', $id);

$statement->execute();
};

suppr($pdo, $jeu);




//NE MARCHE PAS CORRECTEMENT :(((( :
// affichage du message après la suppression
// if (isset($result['nom']) )
// {
//     echo $result['nom'] ." est toujours là";
// } else
// {
//    echo "Ce jeu n'existe plus";
// } ;




