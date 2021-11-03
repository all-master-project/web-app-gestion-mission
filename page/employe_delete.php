<?php
    session_start();
    $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
    if (!isset($login)) // on teste si la variable session existe
    {
    echo "Echec de connexion..." ; //si elle n’exsite pas
    }else{
   require('connexion.php');
//    $idemploye=$_GET['id'];
   extract($_POST);

   $req= "DELETE  FROM employe 
          WHERE idemploye=$idemploye ";
   
   mysql_query($req);
    
    echo "  
    <script>
        document.location.replace('employe_list.php');
    </script> ";
    }
?>
  