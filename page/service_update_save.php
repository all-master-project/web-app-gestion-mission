<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
   require('connexion.php');
   
      extract($_POST);
 
       $req="UPDATE services SET
       idservice= '$idservice',
       nomservice= '$nomservice'
       WHERE idservice='$idserviceE'  " ;
     
     mysql_query($req);
    
     mysql_close($con);

     echo"
      <script>
            document.location.replace('service_list.php')
      </script>
     ";
      }
?>

