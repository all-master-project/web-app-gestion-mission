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
                  <div class="panel-body">
                  <form action="employe_list.php" method="get" class="form-inline">
                        <div class="form-group"> 
                        <input type="text" name="nom" placeholder="Taper le nom de l'employe" class="form-control" 
                               value= <?php echo $_GET['nom'] ; ?>>
                        </div>
                  <label for="specialite">Specialité</label> 
                   <select name="specialite" class="form-control" id="specialite"
                     onchange="this.form.submit()">
                   
                        <option value="all"
                             <?php if ($_GET['specialite']=="all") echo"selected";?> > Tous les specialités
                        </option>

                        <option value="informaticien" 
                             <?php if ($_GET['specialite']=="informaticien") echo"selected"; ?>>Informaticien
                        </option>

                        <option value="SITEL" 
                             <?php if ($_GET['specialite']=="SITEL") echo"selected"; ?>>SITEL
                        </option>

                        <option value="developpeur" 
                             <?php if ($_GET['specialite']=="developpeur") echo"selected"; ?> >developpeur
                        </option>

                        <option value="technicien" <?php if ($_GET['specialite']=="technicien") echo"selected"; ?> >technicien
                        </option>
                  
                   </select>
                   <button type="submit" class="btn btn-success">
                   <span class="glyphicon glyphicon-search"></span> Rechercher...</button>
                   &nbsp; &nbsp;
                    <a href=employe_add_form.php>
                     <span class="glyphicon glyphicon-plus"></span>
                     Nouveau </a> 
                    <a href=employe_creer_file_le.php><img src=images/imprimer.png>Imprimer </a>
                  
                   <!-- <input type="submit" value="Rechercher"> -->
                  </form>
               </div>
            </div>
<?php
session_start();
$login = $_SESSION['login']; //on récupère la donnée de la session appelé login
if (!isset($login)) // on teste si la variable session existe
{
echo "Echec de connexion..." ; //si elle n’exsite pas
}else{
   require('connexion.php');
   
   $nom= isset($_GET['nom']) ? $_GET['nom'] : "";
   $specialite= isset($_GET['specialite']) ? $_GET['specialite'] : "all";
   
   $size= isset($_GET['size'])  ?  $_GET['size'] : 6 ;
   $page= isset($_GET['page'])  ?  $_GET['page'] : 1 ;
   $offset= ($page-1) * $size ;
   
   if($specialite=="all"){
          $req="SELECT * FROM employe
                  WHERE nom like'%$nom%'    
                  limit $size
                  offset $offset";
          $reqCount="SELECT * FROM employe  WHERE nom like '%$nom%'  ";
                        
     }else{
          $req="SELECT * FROM employe  WHERE nom like '%$nom%'
                     AND   specialite='$specialite'  
                     limit $size 
                     offset $offset ";
          $reqCount="SELECT * FROM employe  WHERE nom like '%$nom%'  
                     AND   specialite='$specialite' ";
     }
          $res = mysql_query($req);

          $rescount=mysql_query($reqCount);
          $nomber=mysql_num_rows($rescount);


     ?>
     <div class="panel panel-primary margetop">
                  <div class="panel-heading">List des employes 
                         <?php    echo "($nomber)"; ?> employe
                  </div>
                  <div class="panel-body">
  <meta http-equiv=Content-Type content=text/html;charset=UTF-8>
       <table class='table table-striped table-bordered'>
            <thead>
               <tr>
                    <th>Id<th>Nom<th>Prénom<th>cin<th>date de naissance<th>addresse<th>ville
                    <th>email<th>date de recrutement<th>specialite
               </tr>
            </thead>
       <tbody>
<?php
          while ($data=mysql_fetch_array($res)) {
                                                                 
          echo"<tr>
                    <td>$data[idemploye]</td>
                    <td>$data[nom]</td>        
                    <td>$data[prenom]</td>
                    <td>$data[cin]</td>
                    <td>$data[ddn]</td>
                    <td>$data[addresse]</td>
                    <td>$data[ville]</td>
                    <td>$data[email]</td>
                    <td>$data[ddr]</td>
                    <td>$data[specialite]</td>
                    <td>
                    <a href=employe_update_form.php?id=$data[idemploye]>
                    <span class='glyphicon glyphicon-edit'></span></a>
                    </td>
                    <td>
                    <a onclick=return confirm('Etes-vous sur de vouloir supprimer l\'employe ...')  href=employe_delete_confirm.php?id=$data[idemploye] >
                    <span class='glyphicon glyphicon-trash'></span></a>  
                    </td>
               </tr>";
                         }    
                    echo" </div>
                    </div> 
          </tbody>
               </div>
             </table>
             ";?>
<?php
               $reste=$nomber%$size;
               $nbPage=0;
               if($reste===0){
                    $nbPage = $nomber/$size ; 
               }else {
                    $nbPage = floor($nomber/$size) + 1 ; 
               }
               echo"
               <div>
                  <ul class='pagination pagination-md'> ";
                    for ($i=1; $i <=$nbPage ; $i++) {  ?>     
                     <li class="<?php if($i==$page) echo 'active' ?>"  >
                       <a <?php echo "href=employe_list.php?page=$i&specialite=$specialite&nom=$nom >$i</a> 
                    </li> ";
                    }                        
                    echo"
                    </ul>
               </div>
         </div>
      </div> ";?>
<?php
     echo"<div id='dessent'>";
      include('footer.php');
     echo"</div>
</body>
</html> ";
   }
?>
