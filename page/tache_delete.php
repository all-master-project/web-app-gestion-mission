<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
   require('connexion.php');
   $idtache=$_GET['id'];

   echo $req= "DELETE  FROM tache 
          WHERE idtache=$idtache ";
   
   mysql_query($req);
    
    echo "  
    <script>
        document.location.replace('tache_list.php');
    </script> ";
    }
?>
  