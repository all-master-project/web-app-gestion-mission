<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
   require('connexion.php');
   
   extract($_POST);

echo $req="UPDATE avoirmission SET
            idmission= $idmission, 
            idchefservice= $idchefservice
            WHERE idam=$idam  ";

     mysql_query($req);

     mysql_close($con);

     echo"
      <script>
            document.location.replace('avoirmission_list.php')
      </script>
     ";
      }
?>

