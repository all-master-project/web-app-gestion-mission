<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
   require('connexion.php');

   extract($_POST);

        $req="INSERT INTO avoirmission VALUES
            (null, $idmission, $idchefservice)  ";
        mysql_query($req);

        echo"
            <script>
                document.location.replace('avoirmission_list.php');
            </script>
        ";
    }
?>