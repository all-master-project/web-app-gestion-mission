<?php 
    //Cette ligne doit être placée en 1ère ligne
    session_start() ; 
//    echo"(^-^)......(^-^)......(^-^)";
    //On récupère le login et le mot de passe
    extract($_POST);
    // echo $login."| |".$motdepasse;
    //on garde le login dans $_SESSION[‘login’]
    $_SESSION['login'] = $login ; 
    
    $con= require('connexion.php');
    $req= "SELECT * FROM employe
           WHERE login = '$login'
           AND   motdepasse = '$motdepasse' ";
    $res= mysqli_query($con, $req);
    // $nomb= mysqli_num_rows($res);
    while ($data=mysqli_fetch_array($res)) {
        if($data['login'] = $login && $data['motdepasse'] = $motdepasse)
            echo" <script> document.location.replace('employe_list.php') </script> ";
           }
        echo"login: ".$login." mot de passe = ".$motdepasse." incorrect echec de connexion....";
?>