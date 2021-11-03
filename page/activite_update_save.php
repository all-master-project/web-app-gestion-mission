<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
            $con= require('connexion.php');
   
      extract($_POST);

      echo 
       $req="UPDATE activite SET
       titreactivite= '$titreactivite',
       da= '$da',
       ha= '$ha',
       idtache= $idtache,
       commentaire='$commentaire'
       WHERE idactivite=$idactivite " ;

     mysqli_query($con, $req);
    
     mysqli_close($con);

     echo"
      <script>
            document.location.replace('activite_list.php')
      </script>
     ";
      }
?>

