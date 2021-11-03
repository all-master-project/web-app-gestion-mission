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
   $con= require('connexion.php');
   $req="SELECT affectation.*, employe.*, services.* FROM affectation, employe, services 
         WHERE employe.idemploye= affectation.idemploye
          AND  services.idservice= affectation.idservice 
          ORDER BY idaffectation asc";
   $res=mysqli_query($con, $req);
  echo"
  <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
  <div class=table_data>
  <a href=affectation_add_form.php><img src=images/add.png>Nouveau</a>
  <a href=affcetation_creer_file_le.php><img src=images/imprimer.png>Imprimer </a>
  <form method=POST  action=>
       <table border=1px inset black>
       <th>Id affectation<th>Nom employe<th>Prenom employe<th>Nom service
       <th>fonction<th>date d'afectation<th>date fin d'affectation
       ";
       while ($data=mysqli_fetch_array($res)) {
        echo"<tr>
               <td>$data[idaffectation]</td>
               <td>$data[nom]</td>
               <td>$data[prenom]</td>
               <td>$data[nomservice]</td>
               <td>$data[fonction]</td>
               <td>$data[dda]</td>
               <td>$data[dfa]</td>
               <td><a href=affectation_update_form.php?id=$data[idaffectation]><img src=images/update.png alt=></a></td>
               <td><a href=affectation_delete_confirm.php?id=$data[idaffectation]><img src=images/delete.png alt=></a></td>
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
