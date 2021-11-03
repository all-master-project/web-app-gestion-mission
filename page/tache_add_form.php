<?php
  require('connexion.php');
  

?>

<form action= tache_add_save.php method=POST>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire tache </legend>
         <table>
          <tr>
            <td>Id</td><td><input type=number placeholder=AUTO disabled= ></td>
          </tr>
          <tr>
            <td>Titre de la tache</td><td><input type=text name=titretache placeholder="Titre de la tache"></td>
          </tr>
          <tr>
            <td>Date début de la tache</td><td><input type=date name=ddt></td>
          </tr>
          <tr>
            <td>Date fin théorique de la tache</td><td><input type=date name=dftt></td>
          </tr>
          <tr>
            <td>Date fin réel de la tache</td><td><input type=date name=dfrt></td>
          </tr>
          <tr>
            <td>Id Mission</td>
            <td><select name=idmission>
               <?php
               $req="SELECT *  FROM mission";
               $res=mysql_query($req);

               while ($data=mysql_fetch_array($res)) {
                      echo"
                      <option value=$data[idmission]>$data[titremission]</option>
                      ";
                  }

                ?>
            </select></td>
          </tr>
          <tr>
            <td>id employe</td><td>
               <select name=idemploye>
                <?php
                    $req="SELECT * FROM employe";
                    $res=mysql_query($req);
                    while ($data=mysql_fetch_array($res)) {
                    echo"
                    <option value=$data[idemploye]>$data[nom]</option>
                    ";
                    }
                ?></select></td>
          <tr><td><input type=submit value=AFFECTER></td></tr>
         </table>
    </fieldset>  
</form>