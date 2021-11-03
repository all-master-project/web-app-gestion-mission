<?php
  $con= require('connexion.php');
  

?>

<form action= affectation_add_save.php method=POST>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire Affectation Employe a un Service</legend>
         <table>
          <tr>
            <td>Id</td><td><input type=number placeholder=AUTO disabled= ></td>
          </tr>
          <tr>
            <td>Date d'affectation</td><td><input type=date name=dda ></td>
          </tr>
          <tr>
            <td>Date fin d'affectation</td><td><input type=date name=dfa></td>
          </tr>
          <tr>
            <td>Function</td>
            <td><select name=fonction>
               <?php
               $fonction = array("Comptable", "Ingénieur", "Manager"); 
               $i=0;
               while ($i<=2) {
                      echo"
                      <option value=$fonction[$i]>$fonction[$i]</option>
                      ";
                      $i++;
                  }

                ?>
            </select></td>
          </tr>
          <tr>
            <td>id employe</td><td>
               <select name=idemploye>
                <?php
                    $req="SELECT * FROM employe";
                    $res=mysqli_query($con, $req);
                    while ($data=mysqli_fetch_array($res)) {
                    echo"
                    <option value=$data[idemploye]>$data[nom]</option>
                    ";
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
                    echo"
                    <option value=$datas[idservice]>$datas[nomservice]</option>
                    ";
                    }
                ?></select></td>
          </tr>
          
          <tr><td><input type=submit value=AFFECTER></td></tr>
         </table>
    </fieldset>  
</form>