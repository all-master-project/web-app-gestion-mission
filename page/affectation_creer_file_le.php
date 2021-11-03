<?php
  $con= require('connexion.php');

  $file= fopen('employe.txt','w');
  
  $req="SELECT employe.*, departement.* FROM employe, departement
        WHERE  departement.iddpt= employe.iddpt
        ORDER BY employe.ide asc";
  $res=mysqli_query($con, $req);

  while ($data=mysqli_fetch_array($res)) {
    $ligne="";
    $ligne = $ligne . $data[ide];      $ligne = $ligne .";";
    $ligne = $ligne . $data['nom'];    $ligne = $ligne .";";
    $ligne = $ligne . $data['prenom']; $ligne = $ligne .";";
    $ligne = $ligne . $data['nomdpt']; 
    $file=fopen('employe.txt','a');
    fputs($file,$ligne);
    fputs($file,"\n");
  }

    fclose($file);
    mysqli_close($con);
    echo"
        <script>
        document.location.replace('employe_imprimer_le.php');
        </script>";

    
?>

