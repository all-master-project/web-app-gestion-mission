<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles/form.css">
  <title>Document</title>
</head>
<body>
<div class="form_c">
  <form action= employe_add_save.php method=POST>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">   -->
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
                <form action="employe_add_save.php" method="post">
               <div class="form-group">
                  <label for="emp">Id employe</label><input name="emp" type=number placeholder=AUTO class="form-control" disabled= >
                  <label for="emp">Nom</label><input type=text class="form-control" name=nom >
                  <label for="emp">Prénom</label><input type=text class="form-control" name=prenom>
                  <label for="emp">Cin</label><input type="text" class="form-control" name="cin">
                  <label for="emp">date de naissance</label><input name="ddn" class="form-control" type="date" >
                  <label for="emp">addresse</label><input type="text" name="addresse" class="form-control" >
                  <label for="emp">ville</label><input type="text" name="ville"  class="form-control" >
                  <label for="emp">email</label><input type="text" name="email" class="form-control" >
                  <label for="emp">date de recrutement</label><input type="date" name="ddr" class="form-control" >
                  <label for="emp">Specialite</label><input type="text" name="specialite" class="form-control" >
                  <label for="emp">login</label><input type="text" name="login" class="form-control" >
                  <label for="emp">mot de passe</label><input type="password" name="motdepasse" class="form-control">
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