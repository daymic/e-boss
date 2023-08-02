
<?php
session_start();

include('connect_db.php');

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
            echo " <h1> Bienvennu sur votre tableau de bord {$userinfo['nom']} {$userinfo['prenoms']} </h1> "
        ?>
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         
         }
         ?>
         <br />
         <button><a href="profil1.php?id=<?= $getid ?>" >Voir Profil</a></button>
         <button><a href="_cours/cours.php?id=<?= $getid ?>">Voir mes cours</a></button>
         <button><a href="_login/logout.php?id=<?= $getid ?>">Se déconnecter</a></button>
      </div>
    <script src="_js/bootstrap.bundle.min.js"></script>
</body>
</html>