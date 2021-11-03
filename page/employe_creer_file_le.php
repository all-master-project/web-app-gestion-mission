<?php
  require('connexion.php');

  $file= fopen('employe.txt','w');
             
  $req="SELECT * FROM employe
        ORDER BY employe.idemploye asc";
  $res=mysql_query($req);

  while ($data=mysql_fetch_array($res)) {

    $ligne="";
    $ligne = $ligne . $data[idemploye];      $ligne = $ligne .";";
    $ligne = $ligne . $data['nom'];    $ligne = $ligne .";";
    $ligne = $ligne . $data['prenom']; $ligne = $ligne .";";
    $ligne = $ligne . $data['cin']; $ligne = $ligne .";";
    $ligne = $ligne . $data['ddn']; $ligne = $ligne .";";
    $ligne = $ligne . $data['addresse']; $ligne = $ligne .";";
    $ligne = $ligne . $data['ville']; $ligne = $ligne .";";
    $ligne = $ligne . $data['email']; $ligne = $ligne .";";
    $ligne = $ligne . $data['ddr']; $ligne = $ligne .";";
    $ligne = $ligne . $data['specialite']; $ligne = $ligne .";";
    $ligne = $ligne . $data['login']; $ligne = $ligne .";";
    $ligne = $ligne . $data['motdepasse'];

    $file=fopen('employe.txt','a');
    fputs($file,$ligne);
    fputs($file,"\n");
  }

    fclose($file);
    mysql_close($con);
    echo"
        <script>
        document.location.replace('employe_imprimer_le.php');
        </script>";

    
?>

