
<?php
session_start();

include('../connect_db.php');

if(isset($_GET['id']) AND ($_GET['id'] > 0)) {
   $getid = intval($_GET['id']);
   $sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
   $sql->execute(array($getid));
   $userinfo = $sql->fetch();
    $_SESSION['nom'] = $userinfo['nom'];
    $_SESSION['prenoms'] = $userinfo['prenoms'];
    $_SESSION['email'] = $userinfo['email'];
    $_SESSION['mdp'] = $userinfo['mdp'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="_css/bootstrap.css">
</head>
<body>
<div align="center">
         <br><br>
        <?php 
            echo " <h1> Voici les cours dont vous suivez. </h1> "
        ?>
         <br />
         <button><a href="profil1.php?id=<?= $getid ?>" >S'inscrir à un cours</a></button>
         <button><a href="../dashboard.php?id=<?= $getid ?>">Acceuil</a></button>
         <button><a href="../_login/logout.php">Se déconnecter</a></button>
      </div>
    <script src="_js/bootstrap.bundle.min.js"></script>
</body>
</html>