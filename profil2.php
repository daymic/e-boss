
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

    $req = $bdd->prepare('SELECT * FROM cours LEFT JOIN utilisateurs ON cours.id = utilisateurs.id WHERE utilisateurs.id = ?' );
    $req ->execute(array($getid));
    $usercours = $req->fetch();
    $_SESSION['titre'] = $usercours['titre'];
    $_SESSION['description'] = $usercours['description'];

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
         <h2>Bonjour et bienvenu cher professeur!
         <br><br>
         <h3> Nom : <?php echo $userinfo['nom']; ?>
         <br /></h3>
         <h3> Prenom : <?php echo $userinfo['prenoms']; ?>
         <br /></h3>
         <h3> Statut : <?php echo $userinfo['statut']; ?>
         <br /></h3>
         <h3> Prof : <?php echo $usercours['titre']; ?>
         <br /></h3>
         <h3> Description : <?php echo $usercours['description']; ?>
         <br /></h3>
         <br />
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         
         }
         ?>
         <br />
         <button><a href="dashboard.php?id=<?= $getid ?>" >Acceuil</a></button>
         <button><a href="_cours/cours.php?id=<?= $getid ?>">Mes cours</a></button>
         <button><a href="index.php">changer mes propos</a></button>
         <button><a href="_login/logout.php">Se déconnecter</a></button>
      </div>
    <script src="_js/bootstrap.bundle.min.js"></script>
</body>
</html>