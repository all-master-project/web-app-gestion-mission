<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
   require('connexion.php');
   
   extract($_POST);

    $req="UPDATE tache SET
      titretache= '$titretache', 
      ddt='$ddt',
      dftt= '$dftt', 
      dfrt= '$dfrt',
      idmission= '$idmission',
      idemploye='$idemploye'
      WHERE idtache=$idtacheE   ";
     
     mysql_query($req);
    
     mysql_close($con);

     echo"
      <script>
            document.location.replace('tache_list.php')
      </script>
     ";
    }
?>

