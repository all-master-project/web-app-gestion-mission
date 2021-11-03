<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/monstyle.css">
</head>
<body>
     <?php
      include("menu.php");//copier le code php et coller ici
      require('connexion.php');
             $size = isset($_GET['size']) ? $_GET['size'] : 6 ;
             $page = isset($_GET['page']) ? $_GET['page'] : 1 ;
             $offset = ( $page - 1 ) * $size;

             $req="SELECT * FROM services
                     limit  $size
                     offset $offset ";
             $res=mysql_query($req);

             $reqCount = "SELECT * FROM services ";
             $resCount = mysql_query($reqCount);
             $nomberSerivce=mysql_num_rows($resCount);
     ?>
     <div class="container">
        <div class="panel panel-success margetop70">
                 <div class="panel-heading">Option</div>
                  <div class="panel-body">
                   <div id="centre">
                    <a href=employe_add_form.php>
                    <span class="glyphicon glyphicon-plus"></span>
                     Nouveau... </a> 
                    <a href=employe_creer_file_le.php><img src=images/imprimer.png>Imprimer... </a>
                  </div>
                </div>
                </div>
        <div class="panel panel-primary margetop70">
            <div class="panel-heading">List des Services <?php echo "(".$nomberSerivce." service)"; ?></div>
               <div class="panel-body">
                 <form method=POST  action=>
                        <table class='table table-striped table-bordered'>
                         <tr>
                          <thead>
                            <th>Id service<th>Nom service
                          </thead>
                         </tr>
                         <body>
                           <?php
                            while ($data=mysql_fetch_array($res)) {
                         echo"<tr>
                                    <td>$data[idservice]</td>
                                    <td>$data[nomservice]</td>
                                    <td>
                                          <a href=service_update_form.php?id=$data[idservice]>
                                          <span class='glyphicon glyphicon-edit'></span></a>
                                    </td>
                                    <td>
                                          <a onclick=return confirm('Etes-vous sur de vouloir supprimer le service ...')  href=service_delete_confirm.php?id=$data[idservice] >
                                          <span class='glyphicon glyphicon-trash'></span></a>  
                                    </td>
                              </tr> ";  }
                              ?>
                  </body>
            </table>
            <?php
               $reste=$nomberSerivce%$size;
               $nbPage=0;
               if($reste===0){
                    $nbPage = $nomberSerivce/$size ; 
               }else {
                    $nbPage = floor($nomberSerivce/$size) + 1 ; 
               }
               echo"
               <div>
                  <ul class='pagination pagination-md'> ";
                    for ($i=1; $i <=$nbPage ; $i++) {  ?>     
                     <li class="<?php if($i==$page) echo 'active' ?>"  >
                       <a <?php echo "href=service_list.php?page=$i&size=$size>$i</a> 
                    </li> ";
                    }                        
                    echo"
                    </ul>
               </div>
         </div>
      </div>
  </body>
</html>
"; 
?>