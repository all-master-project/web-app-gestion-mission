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
                <form action="employe_delete.php" method="post">
               <div class="form-group">
                  <label for="emp">Id employe</label>
                       <input name="idemploye" type=number class="form-control" value="<?php  echo $data[idemploye];?>" readonly= >
                  <label for="emp">Nom</label>
                       <input type=text class="form-control" value="<?php echo $data['nom']; ?>" name=nom readonly=>
                  <label for="emp">Prénom</label>
                       <input type=text class="form-control" value="<?php echo $data['prenom']; ?>" name=prenom readonly=>
                  <label for="emp">Cin</label>
                        <input type="text" class="form-control" value="<?php echo $data['cin']; ?>" name="cin" readonly=>
                  <label for="emp">date de naissance</label>
                        <input  type="date" class="form-control" value="<?php echo $data['ddn']; ?>" name="ddn" readonly=>
                  <label for="emp">addresse</label>
                        <input type="text"  class="form-control" value="<?php echo $data['addresse']; ?>" name="addresse" readonly=>
                  <label for="emp">ville</label>
                        <input type="text" class="form-control" value="<?php echo $data['ville']; ?>"  name="ville"  readonly=>
                  <label for="emp">email</label>
                        <input type="text" class="form-control" value="<?php echo $data['email']; ?>" name="email"  readonly=>
                  <label for="emp">date de recrutement</label>
                        <input type="date"  class="form-control" value="<?php echo $data['ddr']; ?>" name="ddr" readonly=>
                  <label for="emp">Specialite</label>
                        <input type="text" class="form-control" value="<?php echo $data['specialite']; ?>" name="specialite" readonly=>
                  <label for="emp">login</label>
                        <input type="text" class="form-control" value="<?php echo $data['login']; ?>" name="login" readonly=>
                  <label for="emp">mot de passe</label>
                        <input type="password" class="form-control" name="motdepasse" value="<?php echo $data['motdepasse']; ?>" readonly=>
            </div>
             <div class="form-group ">
                    <button onclick="confirm('etes-vous sure de supprimer cet employe')" type="submit" class="btn btn-success">
                        SUPPRIMER...
                    </button>
             </div>
           </form> 
        </div>
    </div>
 </div>
</body>
</html>






<?php
/*
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
   

  echo"
  <?php
  require('connexion.php');
?>

<meta http-equiv=Content-Type content=text/html;charset=UTF-8>  
    <fieldset>
       <legend>Formulaire Employé</legend>
         <table>
          <tr>
                            <input type=hidden name=idemploye value=$data[idemploye]>
            <td>Id employe</td>
                        <td><input type=number value=$data[idemploye] readonly= ></td>
          </tr>
          <tr>
            <td>Nom</td><td><input type=text name=nom value=$data[nom] readonly=></td>
          </tr>
          <tr>
            <td>Prénom</td><td><input type=text name=prenom value=$data[prenom] readonly=></td>
          </tr>
          <tr>
            <td>Cin</td><td><input type=text name=cin value=$data[cin] readonly=></td>
          </tr>
          <tr>
            <td>date de naissance</td><td><input name=ddn type=date value=$data[ddn] readonly=></td>
          </tr>
          <tr>
            <td>addresse</td><td><textarea type=addresse name=addresse readonly=>$data[addresse]</textarea></td>
          </tr>
          <tr>
            <td>ville</td><td><input type=text name=ville value=$data[ville] readonly=></td>
          </tr>
          <tr>
            <td>email</td><td><input type=text name=email value=$data[email] readonly=></td>
          </tr>
          <tr>
            <td>date de recrutement</td><td><input type=date name=ddr value=$data[ddr] readonly=></td>
          </tr>
          <tr>
            <td>Specialite</td><td><textarea type=text name=specialite readonly=>$data[specialite]</textarea></td>
          </tr>
          <tr>
            <td>login</td><td><input type=text name=login value=$data[login] readonly= ></td>
          </tr>
          <tr>
            <td>mot de passe</td><td><input type=password name=motdepasse value=$data[motdepasse] readonly=></td>
          </tr>
          <tr><td>Vous-voulez vraiment supprimer ???</td>
              <td><a href= employe_delete.php?id=$data[idemploye]>Oui</a></td>
              <td><a href= employe_list.php>Non</a></td>
          </tr>
         </table>
    </fieldset> 
  ";
  }*/
?>