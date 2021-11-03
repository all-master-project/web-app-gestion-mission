<?php
  require('connexion.php');
  
?>

<form action= mission_add_save.php method=POST>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire mission</legend>
         <table>
          <tr>
            <td>Id Mission </td><td><input type=number placeholder=AUTO disabled= ></td>
          </tr>
          <tr>
            <td>Titre mission</td><td><input type=text name=titremission placeholder="Titre mission"></td>
          </tr>
          <tr>
            <td>Date d'affectation mission</td><td><input type=date name=ddm ></td>
          </tr>
          <tr>
            <td>Date fin theorique mission</td><td><input type=date name=dftm ></td>
          </tr>
          <tr>
            <td>Date fin real mission</td><td><input type=date name=dfrm ></td>
          </tr>
          </tr>
            <tr><td><input type=submit value=AJOUTER></td>
          </tr>
         </table>
    </fieldset>  
</form>