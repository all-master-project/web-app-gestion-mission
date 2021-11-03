<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
    $con= require('connexion.php');

  $idaffectation= $_GET['id'];

  $req="SELECT * FROM affectation
        WHERE idaffectation=$idaffectation";
  $res=mysqli_query($con, $req);
  $data=mysqli_fetch_array($res);
  }
?>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire Affectation Employe a un Service</legend>
         <table>
          <tr>
            <td>Id</td><td><input type=number name=idaffectation value=<?php echo $data[idaffectation]?> readonly= ></td>
          </tr>
          <tr>
            <td>Date d'affectation</td><td><input type=date name=dda value=<?php echo $data['dda']?> readonly= ></td>
          </tr>
          <tr>
            <td>Date fin d'affectation</td><td><input type=date name=dfa value=<?php echo $data['dfa']?> readonly=></td>
          </tr>
          <tr>
            <td>Function</td><td><input type=text name=fonction value=<?php echo $data['fonction'] ?> readonly=></td>
          </tr>
          <tr>
            <td>id employe</td><td><input type=text name=idemploye value=<?php echo $data[idemploye] ?> readonly=></td>
          </tr>
          <tr>
            <td>id Service</td><td><input type=text name=idservice value=<?php echo $data['idservice'] ?> readonly=></td>
          </tr>
          <tr>
             <td>Vous-voulez vraiment supprimer ???</td>
             <td><a href=affectation_delete.php?id=<?php echo $data['idaffectation'] ?> >Oui </a></td>
             <td><a href=affectation_list.php>Non</a></td>
          </tr>
         </table>
    </fieldset>  
</form>