<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
   require('connexion.php');

   extract($_POST);

       echo $req="INSERT INTO mission VALUES
            (null, '$titremission', '$ddm', '$dftm', '$dfrm' ) ";
        mysql_query($req);

        echo"
            <script>
                document.location.replace('mission_list.php');
            </script>
        ";
    }
?>