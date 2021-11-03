<?php
  require('connexion.php');
  
?>

<form action=service_add_save.php method=POST>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire service</legend>
         <table>
          <tr>
            <td>Id service </td><td><input type=text name=idservice placeholder="Id service" ></td>
          </tr>
          <tr>
            <td>Nom service</td><td><input type=text name=nomservice placeholder="Nom service"></td>
          </tr>
            <tr><td><input type=submit value=AJOUTER></td>
          </tr>
         </table>
    </fieldset>  
</form>