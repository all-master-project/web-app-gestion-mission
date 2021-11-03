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
   require('connexion.php');
   $req="SELECT avoirmission.*, mission.*, chefservice.* FROM avoirmission, mission, chefservice 
         WHERE chefservice.idchefservice= avoirmission.idchefservice
          AND  mission.idmission= avoirmission.idmission 
        ORDER BY   avoirmission.idam  asc";
   $res=mysql_query($req);
  echo"
  <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
  <a href=avoirmission_add_form.php><img src=images/add.png>Nouveau</a>
  <a href=avoirmission_creer_file_le.php><img src=images/imprimer.png>Imprimer </a>
  <form method=POST  action=>
       <table border=1px inset black>
       <th>Id avoir mission<th>Id Mission<th>Titre Mission<th>ID chef service
       <th>nom <th>prenom <th>Chef service de
       ";
       while ($data=mysql_fetch_array($res)) {
         $reqChef= "SELECT chefservice.*, employe.*, services.* FROM chefservice, employe, services
                WHERE  chefservice.idchefservice= $data[idchefservice]
                 AND   employe.idemploye= chefservice.idemploye
                 AND   services.idservice= chefservice.idservice ";
        
        $resChef= mysql_query($reqChef);
        $dataChef= mysql_fetch_array($resChef);
        
        echo"<tr>
        
               <td>$data[idam]</td>
               <td>$data[idmission]</td>
               <td>$data[titremission]</td>
               <td>$dataChef[idchefservice]</td>
               <td>$dataChef[nom]</td>
               <td>$dataChef[prenom]</td>
               <td>$dataChef[nomservice]</td>

               <td><a href=avoirmission_update_form.php?id=$data[idam]><img src=images/update.png alt=></a></td>
               <td><a href=avoirmission_delete_confirm.php?id=$data[idam]><img src=images/delete.png alt=></a></td>
            </tr>";
       }
    
          echo"
          </table>
      </form>
    </div>
  </body>
</html>
  ";
   
?>
               
