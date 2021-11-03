<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
   require('connexion.php');
   
   extract($_POST);

echo $req="UPDATE affectation SET
      idemploye= $idemploye, 
      idservice= '$idservice', 
      dda= '$dda',
      dfa= '$dfa',
      fonction='$fonction'
      WHERE idaffectation=$idaffectation";
     
     mysql_query($req);
    
     mysql_close($con);

     echo"
      <script>
            document.location.replace('affectation_list.php')
      </script>
     ";
    }
?>

