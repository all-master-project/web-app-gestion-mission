<?php
  session_start();
  $login = $_SESSION['login']; //on récupère la donnée de la session appelé login
  if (!isset($login)) // on teste si la variable session existe
  {
  echo "Echec de connexion..." ; //si elle n’exsite pas
  }else{
    $con =require('connexion.php');

  $idaffectation= $_GET['id'];

  $req="SELECT * FROM affectation
        WHERE idaffectation=$idaffectation";
  $res=mysqli_query($con, $req);
  $data=mysqli_fetch_array($res);
  }
?>

<form action= affectation_update_save.php method=POST>
 <meta http-equiv=Content-Type content=text/html;charset=UTF-8>  
    <fieldset>
       <legend>Formulaire Affectation Employe a un Service</legend>
         <table>
          <tr>
            <td>Id</td><td><input type=number name=idaffectation value=<?php echo $data[idaffectation]?> readonly= ></td>
          </tr>
          <tr>
            <td>Date d'affectation</td><td><input type=date name=dda value=<?php echo $data['dda']?> ></td>
          </tr>
          <tr>
            <td>Date fin d'affectation</td><td><input type=date name=dfa value=<?php echo $data['dfa']?> ></td>
          </tr>
          <tr>
            <td>Function</td>
            <td><select name=fonction>
               <?php
               $fonction = array("Comptable", "Ingénieur", "Manager"); 
               $i=0;
               while ($i<=2) {
                     if($fonction[$i]==$data['fonction']){
                   echo  "<option value=$data[fonction] selected> $data[fonction] </option> ";
                     }else{                      
                   echo "<option value=$fonction[$i]>$fonction[$i]</option>";
                     }
                    $i++;
                  }
                ?>
            </select></td>
          </tr>
          <tr>
            <td>id employe</td><td>
               <select name=idemploye>
                <?php
                    $reqe="SELECT * FROM employe ";
                    $rese=mysqli_query($con, $reqe);
                    while ($datae=mysqli_fetch_array($rese)) {
                    if($datae['idemploye']==$data['idemploye']){
                echo" <option value=$datae[idemploye] selected>$datae[nom]</option> ";
                      }else{
                echo" <option value=$datae[idemploye]>$datae[nom]</option> ";
                      }
                    }
                ?></select></td>
          </tr>
          <tr>
            <td>id Service</td><td>
               <select name=idservice>
                <?php
                    require('connexion.php');
                    $reqs="SELECT * FROM services";
                    $ress=mysqli_query($con, $reqs);
                    while ($datas=mysqli_fetch_array($ress)) {
                      if($data['idservice']==$datas['idservice']){
              echo"<option value=$datas[idservice] selected>$datas[nomservice]</option> ";
                    }else{
              echo"<option value=$datas[idservice]>$datas[nomservice]</option> ";        
                    }
                    }
                ?></select></td>
          </tr>
          <tr><td><input type=submit value=MODIFIER></td></tr>
         </table>
    </fieldset>  
</form>