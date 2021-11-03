<form action=activite_add_save.php method=POST>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">  
    <fieldset>
       <legend>Formulaire service</legend>
         <table>
          <tr>
            <td>Id activite</td><td><input type=number name=idactivite placeholder="AUTO" Disabled></td>
          </tr>
          <tr>
            <td>Titre d'activite</td><td><input type=text name=titreactivite placeholder="Nom de l'activite"></td>
          </tr>
          <tr>
            <td>Date d'activite</td><td><input type=date name=da ></td>
          </tr>
          <tr>
            <td>Heure d'activite</td><td><input type=time name=ha	 placeholder="hh:mm:ss"></td>
          </tr>
          <tr>
            <td>Id tache</td><td> <select name="idtache">
            <?php
              $con=require('connexion.php');
              $req="SELECT * FROM tache";
              $res= mysqli_query($con, $req);
              while ($data=mysqli_fetch_array($res)) {
                 echo"
                 <option value=$data[idtache]>$data[titretache]</option>
                 ";
              }
            ?>
            </select></td>
          </tr>
          <tr>
            <td>Commentarie</td><td>
                        <textarea type=text cols="30" rows="10" name=commentaire>  
                          Ecrire une Description détailees sur l'activitee a faire
                        </textarea></td>
          </tr>
          <tr>
             <td><input type=submit value=AJOUTER></td>
          </tr>          
         </table>
    </fieldset>  
</form>