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
   $req="SELECT * FROM mission ";
   $res=mysql_query($req);
  echo"
  <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
  <a href=mission_add_form.php><img src=images/add.png>Nouveau</a>
  <a href=mission_creer_file_le.php><img src=images/imprimer.png>Imprimer </a>
  <form method=POST  action=>
       <table border=1px inset black>
       <th>Id mission<th>Titre mission<th>Date d'affectation mission
       <th>Date fin theorique mission<th>Date fin real mission ";
       while ($data=mysql_fetch_array($res)) {
        echo"<tr>
               <td>$data[idmission]</td>
               <td>$data[titremission]</td>
               <td>$data[ddm]</td>
               <td>$data[dftm]</td>
               <td>$data[dfrm]</td>
               <td><a href=mission_update_form.php?id=$data[idmission]><img src=images/update.png alt=></a></td>
               <td><a href=mission_delete_confirm.php?id=$data[idmission]><img src=images/delete.png alt=></a></td>
            </tr> ";
       }
    
      echo"
           </table>
         </form>
      </div>
    </body>
</html>
  ";
   
?>
