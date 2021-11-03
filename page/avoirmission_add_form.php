<?php
  require('connexion.php');
?>

<form action= avoirmission_add_save.php method=POST>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire avoir mission</legend>
         <table>
          <tr>
            <td>Id</td><td><input type=number placeholder=AUTO disabled= ></td>
          </tr>
          <tr>
            <td>Mission</td>
            <td><select name=idmission>
            <?php
            require('connexion.php');
            $req= "SELECT * FROM mission ";
            $res=mysql_query($req);
            while($data=mysql_fetch_array($res)){
              echo"<option value=$data[idmission]>$data[titremission]</option>";
            }
            ?></select></td>
          </tr>
          <tr>
            <td>Chef Service</td>
            <td><select name=idchefservice>
            <?php
            require('connexion.php');
            $req= "SELECT chefservice.*, employe.*  FROM chefservice, employe
                    WHERE employe.idemploye= chefservice.idemploye";
            $res=mysql_query($req);
            while($data=mysql_fetch_array($res)){
              echo"<option value=$data[idchefservice]>$data[nom]</option>";
            }
            ?></select></td>
          </tr>      
          <tr><td><input type=submit value=AFFECTER></td></tr>
         </table>
    </fieldset>  
</form>