<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
  require('connexion.php');

  $idmission=$_GET['id'];
  $req="SELECT * FROM mission
         WHERE idmission = $idmission";
  $res=mysql_query($req);
  $data=mysql_fetch_array($res);
  }
?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire mission</legend>
         <table>
          <tr>
            <td>Id Mission </td><td><input type=number name=idmission value=<?php echo $data['idmission'] ?>  readonly= ></td>
          </tr>
          <tr>
            <td>Titre mission</td><td><input type=text name=titremission  value=<?php echo $data['titremission'] ?> readonly= ></td>
          </tr>
          <tr>
            <td>Date d'affectation mission</td><td><input type=date name=ddm  value=<?php echo $data['ddm'] ?> readonly= ></td>
          </tr>
          <tr>
            <td>Date fin theorique mission</td><td><input type=date name=dftm  value=<?php echo $data['dftm'] ?> readonly= ></td>
          </tr>
          <tr>
            <td>Date fin real mission</td><td><input type=date name=dfrm  value=<?php echo $data['dftm'] ?> readonly= ></td>
          </tr>
          </tr>
          <tr>
               <td>Vous-voulez vraiment supprimer cette mission ???</td>
               <td><a href="mission_delete.php?id=<?php echo $data[idmission] ?>">Oui</a></td>
               <td><a href="mission_list.php">Non</a></td>
          </tr>
        </table>
    </fieldset>  