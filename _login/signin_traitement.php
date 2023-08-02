<?php
    session_start();
    include('../connect_db.php');

    if(isset($_POST['OK'])){

        $email = htmlspecialchars($_POST['email']);
        $pass = sha1($_POST['pass']);

        $sql = $bdd->prepare('SELECT * FROM utilisateurs WHERE email = ? AND mdp = ?');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql->execute(array($email,$pass));

        $userprofil = $sql->rowCount();

            if($userprofil == 1){
                $userinfo = $sql->fetch();
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['prenoms'] = $userinfo['prenoms'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['statut'] = $userinfo['statut'];
                $_SESSION['mdp'] = $userinfo['mdp'];
                $_SESSION['id'] = $userinfo['id'];
                
                if ($_SESSION['statut'] == etudiants){
                    header("location: ../profil1.php?id=".$_SESSION['id']);
                    }else{
                    header("location: ../profil2.php?id=".$_SESSION['id']);
                    }
            }else{
                    echo "votre mot de passe ou ou votre est est incorrect.";
                }
        }
?>