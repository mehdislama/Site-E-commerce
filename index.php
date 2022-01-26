<?php

include "inc/fonction.php";

$categories = getAllcategories();

if(!empty($_POST)){

  $produit = searchProduit($_POST['rech']);
}
else{
$produit = getAllproduit();
}
 
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    
<?php
  session_start();
  include "inc/header.php";
?>

      <div class= "row col-12 mt-4">

      <?php
  foreach($produit as $prod){

    print'<div class="col-3 mt-2">
    <div class="card" style="width: 18rem;">
        <img src="images/'.$prod['image'].'" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">'.$prod['nom'].'</h5>
          <p class="card-text">'.$prod['description'].'</p>
          <a href="produit.php?id='.$prod['id'].'" class="btn btn-primary">Afficher</a>
        </div>
      </div>
    </div>';
  }

      ?>
         </div>
    <?php
    include"inc/footer.php";
    ?>
    
  
     
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>

</html>