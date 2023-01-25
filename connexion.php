<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion.php</title>
</head>
<body>
    
</body>
</html>

<?php


//création du PDO
$dsn = "mysql:host=localhost;dbname=ma_collection_jeux;charset=utf8";
$username = "root"; //A changer si besoin
$password = ""; //A changer si besoin
$pdo = new PDO($dsn, $username, $password, array(PDO::ATTR_PERSISTENT => TRUE));