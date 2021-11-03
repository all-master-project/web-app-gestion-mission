<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
  require('connexion.php');
  $idemploye = $_GET['id'];

  $req="SELECT * FROM employe
         WHERE idemploye = $idemploye ";

  $res= mysql_query($req);
  $data= mysql_fetch_array($res);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Page blanche</title>
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/monstyle.css">

    </head>
<body>
     <?php
      include("menu.php");//copier le code php et coller ici
     ?>
     <div class="container">
        <div class="panel panel-primary margetop70">
          <div class="panel-heading">Ajouter employe</div>
            <div class="panel-body">
                <form action="employe_update_save.php" method="post">
               <div class="form-group">
                  <label for="emp">Id employe</label>
                       <input name="idemploye" type=number class="form-control" value="<?php  echo $data[idemploye];?>" readonly= >
                  <label for="emp">Nom</label>
                       <input type=text class="form-control" value="<?php echo $data['nom']; ?>" name=nom >
                  <label for="emp">Prénom</label>
                       <input type=text class="form-control" value="<?php echo $data['prenom']; ?>" name=prenom>
                  <label for="emp">Cin</label>
                        <input type="text" class="form-control" value="<?php echo $data['cin']; ?>" name="cin">
                  <label for="emp">date de naissance</label>
                        <input  type="date" class="form-control" value="<?php echo $data['ddn']; ?>" name="ddn">
                  <label for="emp">addresse</label>
                        <input type="text"  class="form-control" value="<?php echo $data['addresse']; ?>" name="addresse">
                  <label for="emp">ville</label>
                        <input type="text" class="form-control" value="<?php echo $data['ville']; ?>"  name="ville" >
                  <label for="emp">email</label>
                        <input type="text" class="form-control" value="<?php echo $data['email']; ?>" name="email"  >
                  <label for="emp">date de recrutement</label>
                        <input type="date"  class="form-control" value="<?php echo $data['ddr']; ?>" name="ddr">
                  <label for="emp">Specialite</label>
                        <input type="text" class="form-control" value="<?php echo $data['specialite']; ?>" name="specialite">
                  <label for="emp">login</label>
                        <input type="text" class="form-control" value="<?php echo $data['login']; ?>" name="login" >
                  <label for="emp">mot de passe</label>
                        <input type="password" class="form-control" name="motdepasse" value="<?php echo $data['motdepasse']; ?>">
            </div>
             <div class="form-group ">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-plus"></span>AJOUTER...
                    </button>
             </div>
           </form> 
        </div>
    </div>
 </div>
</body>
</html>