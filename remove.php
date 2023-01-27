<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>remove.php</title>
</head>

<body>

</body>

</html>

<?php
// entraînement tp
$query = "DELETE FROM `mes_jeux` WHERE `nom`= `Skyrim`";

$statement = $pdo->query($query);
