
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
         <h2>Bonjour et bienvenu cher étudiant.
         <br><br>
         <h3> Votre Nom = <?php echo $userinfo['nom']; ?>
         <br /></h3>
         <h3> Votre Prenom = <?php echo $userinfo['prenoms']; ?>
         <br /></h3>
         <h3> Statut = <?php echo $userinfo['statut']; ?>
         <br /></h3>
         <br />
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         
         }
         ?>
         <br />
         <button><a href="dashboard.php?id=<?= $getid ?>" >Acceuil</a></button>
         <button><a href="_login/logout.php">Se déconnecter</a></button>
         <button><a href="index.php">Admin</a></button>
      </div>
    <script src="_js/bootstrap.bundle.min.js"></script>
</body>
</html>