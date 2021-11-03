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

<form action= tache_update_save.php method=POST>
 <meta http-equiv=Content-Type content=text/html;charset=UTF-8>  
    <fieldset>
       <legend>Formulaire tache</legend>
         <table>
          <tr>
                        <input type=hidden name=idtacheE value=<?php echo $data[idtache]?> >
            <td>Id tache</td><td><input type=number name=idtache value=<?php echo $data[idtache]?> readonly= ></td>
          </tr>
          <tr>
            <td>Titre de la tache</td><td><input type=text name=titretache value=<?php echo $data['titretache']?> ></td>
          </tr>
          <tr>
            <td>Date début tache</td><td><input type=date name=ddf value=<?php echo $data['ddt']?> ></td>
          </tr>
          <tr>
            <td>Date fin théorique tache</td><td><input type=date name=dftt value=<?php echo $data['dftt']?> ></td>
          </tr>
          <tr>
            <td>Date fin réel tache</td><td><input type=date name=dfrt value=<?php echo $data['dfrt']?> ></td>
          </tr>
          <tr>
            <td>Mission</td>
            <td><select name=idmission>
               <?php
               $reqM="SELECT * FROM mission";
               $resM=mysql_query($reqM);
               while ($dataM=mysql_fetch_array($resM)) {
                     if($dataM[idmission]==$data[idmission]){
                   echo  "<option value=$dataM[idmission] selected> $dataM[titremission] </option> ";
                     }else{                      
                   echo "<option value=$dataM[idmission]>$dataM[titremission]</option>";
                     }
                  }
                ?>
            </select></td>
          </tr>
          <tr>
            <td>Employe</td><td>
               <select name=idemploye>
                <?php
                    $reqM="SELECT * FROM employe ";
                    $resM=mysql_query($reqM);
                    while ($dataM=mysql_fetch_array($resM)) {
                    if($dataM['idemploye']==$data['idemploye']){
                echo" <option value=$dataM[idemploye] selected>$dataM[nom]"." "."$dataM[prenom]</option> ";
                      }else{
                echo" <option value=$dataM[idemploye]>$dataM[nom]"." "."$dataM[prenom]</option> ";
                      }
                    }
                ?></select></td>
          </tr>
          <tr><td><input type=submit value=MODIFIER></td></tr>
         </table>
    </fieldset>  
</form>