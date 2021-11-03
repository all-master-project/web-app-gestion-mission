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
<meta http-equiv=Content-Type content=text/html;charset=UTF-8>  
    <fieldset>
       <legend>Formulaire avoir mission</legend>
         <table>
           <form action= avoirmission_delete.php method=POST>
          <tr>
            <td>Id avoir mission: </td>
            <td><?php echo $data[idam]?></td>
            <input type=hidden name=idam value=<?php echo $data[idam]?> >
          </tr>
          <tr>
            <td>Mission: </td><?php
              require('connexion.php');
              $reqm = "SELECT * FROM mission";
              $resm = mysql_query($reqm);
              while ($datam=mysql_fetch_array($resm)) {
                if($datam[idmission]==$data[idmission]){
                  $infom= $datam[idmission]." | ".$datam['titremission'];
                  echo"<td> $infom </td> 
                  <input name=idmission type=hidden value=$datam[idmission] >
                       ";
                }
              }
             ?>
          </tr>
          <tr>
            <td>Chef service: </td><?php
              require('connexion.php');
              $reqc = " SELECT chefservice.*, employe.* FROM chefservice, employe
                  WHERE  employe.idemploye= chefservice.idemploye  ";
              // $reqc = "SELECT * FROM chefservice";
              $resc = mysql_query($reqc);
              // echo $nbr = mysql_num_rows($resc);

              while ($datac=mysql_fetch_array($resc)) {
                if($datac[idchefservice]==$data[idchefservice]){
                 $info= ' '.$datac[idchefservice].' | '.$datac['nom'].' | '.$datac['prenom'];
                  echo"
                    <td>$info</td>
                    <input type=hidden name=idchefservice value=$datac[idchefservice]>
                  ";
                   }
                }
             ?>
          </tr>
          <tr>
            <td>Vous-voulez vraiement supprimer ???</td>
          </tr>
          <tr><td><input type=submit value=Oui></td>
        </form>
          <form action=avoirmission_list.php>
          <td><input type=submit value=Non></td></tr>
          </form>
         </table>
    </fieldset>  
