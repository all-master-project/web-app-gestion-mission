<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/monstyle.css">
</head>
<body>
     <?php
      include("menu.php");//copier le code php et coller ici
     ?>
     <div class="container">
            <div class="panel panel-success margetop">
                  <div class="panel-heading">Recherche</div>
                  <div class="panel-body">le contenue du panel</div>
            </div>

            <div class="panel panel-primary margetop">
                  <div class="panel-heading">List des employes</div>
                  <div class="panel-body">le contenue du panel</div>
            </div>

<?php
   $con =require('connexion.php');
   
   $req="SELECT activite.*, tache.idtache FROM activite, tache
         WHERE tache.idtache= activite.idtache
         ORDER BY idactivite asc";
   $res=mysqli_query($con, $req);

  echo"
  <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
  <a href=activite_add_form.php><img src=images/add.png>Nouveau</a>
  <a href=activite_creer_file_le.php><img src=images/imprimer.png>Imprimer </a>
  <form method=POST  action=>
       <table border=1px inset black>
       <th>Id activite<th>Titre d'activite<th>Date d'activite<th>Heure d'activite<th>Id tache<th>commentaire ";
       while ($data=mysqli_fetch_array($res)) {
        echo"<tr>
               <td>$data[idactivite]</td>
               <td>$data[titreactivite]</td>
               <td>$data[da]</td>
               <td>$data[ha]</td>
               <td>$data[idtache]</td>
               <td><textarea name= cols=40 rows=3 >$data[commentaire]</textarea></td>
               <td><a href=activite_update_form.php?id=$data[idactivite]><img src=images/update.png alt=></a></td>
               <td><a href=activite_delete_confirm.php?id=$data[idactivite]><img src=images/delete.png alt=></a></td>
            </tr> ";
       }  
      echo"
       </table>
     </form>
    </div>
  </body>
</html>  "; 

?>
