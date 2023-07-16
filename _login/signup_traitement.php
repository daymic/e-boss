<?php

    include('../connect_db.php');

    if(isset($_POST['OK'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $pass = htmlspecialchars($_POST['pass']);
        $role = htmlspecialchars($_POST['role']);


        $sql = $con->prepare('INSERT INTO utilisateurs (nom,prenoms,email,mdp,role)
                VALUES(:nom,:prenoms,:email,:mdp,:role)');
        if ($sql === false){
            die("Erreur de préparation de la réquête:" .$con->error);
        }

        $sql->bind_param("sssss",$nom,$prenom,$email,$pass,$role);

        $sql->execute();
        /*$sql->execute(array(
            'nom' => $nom,
            'prenoms' => $prenom,
            'email' => $email,
            'mdp' => $pass,
            'role' => $role
        ));
        */
    echo "il a été bien ajouté.";

    mysqli_close($con);

    }
?>