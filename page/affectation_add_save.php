<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
        $con= require('connexion.php');

   extract($_POST);

       echo $req="INSERT INTO affectation VALUES
            (null, '$idemploye', '$idservice', '$dda', '$dfa', '$fonction')  ";
        mysqli_query($con, $req);

        echo"
            <script>
                document.location.replace('affectation_list.php');
            </script>
        ";
    }
    
?>