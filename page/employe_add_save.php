<?php

   session_start();

   $login = $_SESSION['login']; //on récupère la donnée de la session appelé login

   if (!isset($login)){
       echo "Echec de connexion..." ; //si elle n’exsite pas
   }else{

   require('connexion.php');

   extract($_POST);

       $req="INSERT INTO employe VALUES
            (null,'$nom', '$prenom', '$cin', '$ddn', '$addresse', '$ville',
        	   '$email', '$ddr', '$specialite', '$login', '$motdepasse')   ";
        mysql_query($req);

        echo"
            <script>
                document.location.replace('employe_list.php');
            </script>
        ";
   }
?>