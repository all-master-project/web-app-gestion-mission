<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
  require('connexion.php');

  $idam= $_GET['id'];

  $req="SELECT * FROM avoirmission
        WHERE idam= $idam ";
  $res=mysql_query($req);
  $data=mysql_fetch_array($res);
  }
?>

<form action= avoirmission_update_save.php method=POST>
 <meta http-equiv=Content-Type content=text/html;charset=UTF-8>  
    <fieldset>
       <legend>Formulaire avoir mission</legend>
         <table>
          <tr>
            <td>Id avoir mission</td><td><input type=number name=idam value=<?php echo $data[idam]?> readonly= ></td>
          </tr>
          <tr>
            <td>Mission</td><td><select name=idmission><?php
              require('connexion.php');
              $reqm = "SELECT * FROM mission";
              $resm = mysql_query($reqm);
              while ($datam=mysql_fetch_array($resm)) {
                if($datam[idmission]==$data[idmission]){
                  echo"
                  <option value=$datam[idmission] selected>$datam[idmission] | $datam[titremission]</option>
                  ";
                }else{
                  echo"
                  <option value=$datam[idmission]>$datam[idmission] | $datam[titremission]</option>
                  ";
                }
              }
             ?> 
             </select></td>
          </tr>
          <tr>
            <td>Chef service</td><td><select name=idchefservice><?php
              require('connexion.php');
              $reqc = " SELECT chefservice.*, employe.* FROM chefservice, employe
                  WHERE  employe.idemploye= chefservice.idemploye  ";
              // $reqc = "SELECT * FROM chefservice";
              $resc = mysql_query($reqc);
              // echo $nbr = mysql_num_rows($resc);

              while ($datac=mysql_fetch_array($resc)) {
                if($datac[idchefservice]==$data[idchefservice]){
                  echo"
                  <option value=$datac[idchefservice] selected>$datac[idchefservice] | $datac[nom] | $datac[prenom]</option>
                  ";
                }else{
                  echo"
                  <option value=$datac[idchefservice] >$datac[idchefservice] | $datac[nom] | $datac[prenom]</option>
                  ";
                }
              }
             ?> 
             </select></td>
          </tr>
          <tr><td><input type=submit value=MODIFIER></td></tr>
         </table>
    </fieldset>  
</form>