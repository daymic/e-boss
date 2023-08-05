
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
         <h2>Voici votre cours!</h2>
         <br><br>
         <h3> Titre : <?php echo $usercours['titre']; ?>
         <br /></h3>
         <br><br>
         <h3> Description : <?php echo $usercours['description']; ?>
         <br /></h3>
         <br />
         <br />
         <button><a href="../_crud/edit.php?id=<?= $getid ?>" >Editer</a></button>
         <button><a href="../_crud/delete.php?id=<?= $getid ?>">Supprimer</a></button>
      </div>
    <script src="_js/bootstrap.bundle.min.js"></script>
</body>
</html>