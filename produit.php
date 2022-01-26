<?php

include "inc/fonction.php";

$categories = getAllcategories();

if(isset($_GET['id'])){

    $produit = getProduitById($_GET['id']);

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
  include "inc/header.php";
?>

      <div class= "row col-12 mt-4">

                    <div class="card col-8 offset-2">
                <img src="images/<?php echo $produit['image'] ; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['nom']  ?></h5>
                    <p class="card-text"><?php echo $produit['description']  ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $produit['prix'] ?> DT</li>
                    <?php
                        foreach($categories as $index =>$c){
                            if($c['id']==$produit['categorie'])
                            print ' <buttopn  class="btn btn-success mb-2">'.$c['nom'].'</button> ';
                        }

                    ?>
                    
                </ul>
                
            </div>

  
         </div>
    <?php
    include"inc/footer.php";
    ?>
  
     
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>

</html>