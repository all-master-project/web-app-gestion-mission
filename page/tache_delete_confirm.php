<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
  require('connexion.php');

  $idtache= $_GET['id'];

  $req="SELECT * FROM tache
        WHERE idtache=$idtache";
  $res=mysql_query($req);
  $data=mysql_fetch_array($res);
  }
?>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire tache</legend>
         <table>
          <tr>
            <td>Id</td><td><input type=number name=idtache value=<?php echo $data[idtache]?> readonly= ></td>
          </tr>
          <tr>
            <td>Titre de la tache</td><td><input type=text name=titretache value=<?php echo $data['titretache']?> readonly= ></td>
          </tr>
          <tr>
            <td>Date début tache</td><td><input type=date name=ddt value=<?php echo $data['ddt']?> readonly= ></td>
          </tr>
          <tr>
            <td>Date fin théorique tache</td><td><input type=date name=dftt value=<?php echo $data['dftt']?> readonly=></td>
          </tr>
          <tr>
            <td>Mission</td><td><input type=text name=fonction value=<?php echo $data[idmission] ?> readonly=></td>
          </tr>
          <tr>
            <td>Employe</td><td><input type=text name=idemploye value=<?php echo $data[idemploye] ?> readonly=></td>
          </tr>
          <tr>
             <td>Vous-voulez vraiment supprimer ???</td>
             <td><a href=tache_delete.php?id=<?php echo $data['idtache'] ?> >Oui </a></td>
             <td><a href=tache_list.php>Non</a></td>
          </tr>
         </table>
    </fieldset>  
</form>