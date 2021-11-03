<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
  require('connexion.php');

  $idservice=$_GET['id'];
  $req="SELECT * FROM services
         WHERE idservice = '$idservice'";
  $res=mysql_query($req);
  $data=mysql_fetch_array($res);
  }
?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/monstyle.css">
   <title>Document</title>
 </head>
 <body>
   <form action="service_update_save.php" method="post">
     <div class="container">
        <div class="panel panel-primary margetop70">
          <div class="panel-heading">UPDATE SERVICE</div>
            <div class="panel-body">
                <form action="service_update_save.php" method="post">
               <div class="form-group">
                  <label for="emp">Id service</label>
                       <input name="idservice" type=text class="form-control" value="<?php  echo $data['idservice'];?>">
                       <input name="idserviceE" type=hidden class="form-control" value="<?php  echo $data['idservice'];?>">
                  <label for="emp">Nom service</label>
                       <input type=text class="form-control" value="<?php echo $data['nomservice']; ?>" name=nomservice >
                </div>
            <div class="form-group ">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span> UPDATE...
                    </button>
           </div>
        </div>
       </div>
     </div>
   </form>
 </body>
 </html>