<?php

/* Database config */

$db_host        = 'localhost';
$db_user        = 'root';
$db_pass        = '';
$db_database    = 'db_pdw'; 

/* End config */


$con = new mysqli($db_host, $db_user, $db_pass, $db_database);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


  // $con=mysql_connect('localhost','root','');
  //      mysql_select_db($con, 'db_pdw');
  // // try {
  // //   $pdo= new PDO('mysql:host=localhost;dbname=db_pdw','root','');
  // // } catch (Exception $exp){
  // //   die("Erreur de connexion : ".$exp->getMessage());
  // // }
?>
