<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
   require('connexion.php');
   
   extract($_POST);

      $req="UPDATE mission SET
       titremission= '$titremission',
       ddm= '$ddm',
       dftm= '$dftm',
       dfrm= '$dfrm'
      WHERE idmission=$idmission";
     
     mysql_query($req);
    
     mysql_close($con);

     echo"
      <script>
            document.location.replace('mission_list.php')
      </script>
     ";
      }
?>

