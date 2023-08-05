<?php
    session_start();
    include('../connect_db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = $bdd->prepare("DELETE FROM cours WHERE id = ?") ;
        $sql->execute(array($getid));

    
    }

    header("location:../_cours/coursprof.php");
?>