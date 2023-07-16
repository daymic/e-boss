<?php
    $servername = "localhost";
    $username = "root";
    $mdp = "";
    $db_name = "eboss";

    $con = mysqli_connect($servername,$username,$mdp,$db_name);

    if (!$con){
        echo "connexion echoué".mysqli_error($con);
    }
?>