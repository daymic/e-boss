<?php

    include('../connect_db.php');

    if(isset($_POST['OK'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $pass = sha1($_POST['pass']);
        $statut = htmlspecialchars($_POST['statut']);


        $sql = $pdo->prepare('INSERT INTO utilisateurs (nom,prenoms,email,mdp,statut)
                VALUES(?,?,?,?,?)');
        if ($sql === false){
            die("Erreur de préparation de la réquête:" .$con->error);
        }else{
            $sql->execute(array($nom,$prenom,$email,$pass,$statut));
            echo "il a été bien ajouté.";
        }
            

    

    $pdo = null;

    }
?>