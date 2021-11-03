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
      <?php include("menu.php"); ?>
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
   require('connexion.php');
   $req="SELECT tache.*, employe.*, mission.* FROM tache, employe, mission 
         WHERE employe.idemploye= tache.idemploye
          AND  mission.idmission= tache.idmission 
          ORDER BY idtache asc";
   $res=mysql_query($req);
  echo"
  <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
  <div class=table_data>
  <a href=tache_add_form.php><img src=images/add.png>Nouveau</a>
  <a href=tache_creer_file_le.php><img src=images/imprimer.png>Imprimer </a>
  <form method=POST  action=>
       <table border=1px inset black>
       <th>Id tache<th>Titre tache<th>Date début tache<th>Date fin
        théeorique tache<th>Date fin
        réel tache<th>Titre mission <th>nom prenom de l'employe
       ";
       while ($data=mysql_fetch_array($res)) {
        echo"<tr>
               <td>$data[idtache]</td>
               <td>$data[titretache]</td>
               <td>$data[ddt]</td>
               <td>$data[dftt]</td>
               <td>$data[dfrt]</td>
               <td>$data[titremission]</td>
               <td>$data[nom]"." "."$data[prenom]</td>
               <td><a href=tache_update_form.php?id=$data[idtache]><img src=images/update.png alt=></a></td>
               <td><a href=tache_delete_confirm.php?id=$data[idtache]><img src=images/delete.png alt=></a></td>
            </tr>";
       }
echo"           </table>
            </form>
         </div>
      </div>
   </body>
</html>
  ";
   
?>
