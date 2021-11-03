<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
   require('connexion.php');

   $idmission=$_GET['id'];

   echo $req= "DELETE  FROM mission 
          WHERE idmission = $idmission ";
   
   mysql_query($req);
    
    echo "  
    <script>
        document.location.replace('mission_list.php');
    </script> ";
    }
?>
  