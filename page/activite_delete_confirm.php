<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
  $con = require('connexion.php');

  $idactivite=$_GET['id'];
  $req="SELECT * FROM activite
        WHERE idactivite = $idactivite ";
  $res=mysqli_query($con, $req);
  $data=mysqli_fetch_array($res);
  }
?>

 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire service</legend>
         <table>
          <tr>
            <td>Id activite</td><td><input type=number rows="30" cols="10" name=idactivite value= <?php  echo $data['idactivite']; ?> readonly></td>
          </tr>
          <tr>
            <td>Titre d'activite</td><td><input type=text name=titreactivite value=<?php echo $data['titreactivite']; ?> readonly ></td>
          </tr>
          <tr>
            <td>Date d'activite</td><td><input type=date name=da value=<?php echo $data['da']; ?> readonly ></td>
          </tr>
          <tr>
            <td>Heure d'activite</td><td><input type=time name=ha	 value=<?php echo $data['ha']; ?> readonly></td>
          </tr>
          <tr>
            <td>Id tache</td><td> <select name="idtache" readonly>
            <?php
              require('connexion.php');
              $reqA="SELECT * FROM tache";
              $resA= mysqli_query($con, $reqA);
              while ($dataA=mysqli_fetch_array($resA)) {
                 if($dataA['idtache']==$data['idtache']){
                  echo"
                  <option value=$dataA[idtache] selected>$dataA[titretache]</option>
                  ";
                 }
              }
            ?>
            </select></td>
          </tr>
          <tr>
            <td>Commentarie</td><?php
              echo "
              <td><textarea type=text cols=30 rows=10 name=commentaire disabled=>  
                $data[commentaire] </textarea></td>"; 
              ?>
          </tr>
          <tr>
             <td>Vous-voulez vraiment supprimer cette activite ?</td>
             <td><a href=activite_delete.php?id=<?php  echo $data['idactivite']; ?> > Oui </a></td>
             <td><a href=activite_list.php> Non </a></td>
          </tr>          
         </table>
    </fieldset>  
</form>