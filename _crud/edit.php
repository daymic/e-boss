
<?php
session_start();

include('../connect_db.php');

if(isset($_GET['id']) AND ($_GET['id'] > 0)) {
   $getid = intval($_GET['id']);

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste_electorale_modifier</title>
</head>
<body>
    <form action="POST" action="editAction.php">
            <input type="hidden" name="id" value = "<?php echo $getid; ?>"><br><br>

            <label>Titre</label>
            <input type="text" name="titre" value = "<?php echo $_SESSION['titre']; ?>"><br><br>

            <label>Description</label>
            <input type="text" name="description" value = "<?php echo $_SESSION['description']; ?>"><br><br>

            <button  type="submit" name="OK">Modifier</button>

    </form>
</body>
</html>