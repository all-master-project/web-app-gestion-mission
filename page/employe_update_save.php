<?php
      session_start();
      $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
      if (!isset($login)) // on teste si la variable session existe
      {
      echo "Echec de connexion..." ; //si elle n’exsite pas
      }else{
   require('connexion.php');
   
   extract($_POST);

echo $req="UPDATE employe SET	
            nom= '$nom' ,	
            prenom= '$prenom' ,	
            cin= '$cin' ,	
            ddn= '$ddn' ,
            addresse= '$addresse' ,  	
            ville= '$ville' ,          	
            email= '$email' ,        	
            ddr= '$ddr',        
            specialite= '$specialite',
            login= '$login',
            motdepasse= '$motdepasse'

      WHERE idemploye= $idemploye ; ";
     
     mysql_query($req);
    
     mysql_close($con);
     echo"
      <script>
            document.location.replace('employe_list.php')
      </script>
     ";
  }
?>

