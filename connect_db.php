<?php
$servername = "localhost";
$username = "root";
$mdp = "";
$db_name = "eboss";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=$db_name;charset=utf8", $username, $mdp);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>

