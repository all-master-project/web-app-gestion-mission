<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
   $con= require('connexion.php');

   extract($_POST);
        $req="INSERT INTO activite VALUES
            ( 
               null,
              '$titreactivite',
              '$da',
              '$ha',
               $idtache,
              '$commentaire'
              )";
        mysqli_query($con, $req);

        echo"
            <script>
                document.location.replace('activite_list.php');
            </script>
        ";
    }
?>