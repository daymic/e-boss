<?php
    
    session_start();
    include('../connect_db.php');

    if (isset($_POST['modifier'])){
        $getid = intval($_GET['id']);
        $_SESSION['titre'] = $usercours['titre'];
        $_SESSION['description'] = $usercours['description'];

        $sql = $bdd->prepare("UPDATE cours SET titre = ?, description=? WHERE id = ?");
        $sql->execute(array($_SESSION['titre'], $_SESSION['description'], $getid));
        

        
    }
    header ("location:../_cours/coursprof.php");
?>