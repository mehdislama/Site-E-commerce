<?php
session_start();

include "inc/fonction.php";

if(isset($_SESSION['nom'])){ //me 3maltech connexion
  header('location:profil.php');
}

$showResitrationAlert = 0;

$categories = getAllcategories();

if(!empty($_POST)){ 

    if(AddVisiteur($_POST)){

      $showResitrationAlert=1;
    };


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
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
">
</head>
<body>
<?php
  include "inc/header.php";
?>
    <div class="row-12 p-5">
      <form action="registre.php" method="POST">
        <h1 class="text-center">Registre</h1>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nom</label>
          <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telephone</label>
            <input type="text" name="tel" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Passeword</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Sauvegarder</button>


      
      </form>

    </div>

    <?php
    include"inc/footer.php";
    ?>
  
      </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>


<?php
if($showResitrationAlert==1){
  print "<script>
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Creation de compte avec succes !',
    showConfirmButton: false,
    timer: 1500
  })
  
  </script>";
}


?>


</html>