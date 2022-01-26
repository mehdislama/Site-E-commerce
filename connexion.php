<?php
session_start();
include "inc/fonction.php";
$user=true;
$categories = getAllcategories();

if(isset($_SESSION['nom'])){ //me 3maltech connexion
  header('location:profil.php');
}

if(!empty($_POST)){   
  $user = ConnectVisiteur($_POST);
  if(  is_array($user)&& count($user) > 0 ){ 
    Session_start();
    $_SESSION['email']=$user['email'];
    $_SESSION['nom']=$user['nom'];
    $_SESSION['prenom']=$user['prenom'];
    $_SESSION['pass']=$user['pass'];
    $_SESSION['tel']=$user['tel'];
    
    header('location:profil.php');

    }
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
    <div class="row-12 p-5">
        <h1 class="text-center">Connexion</h1>
      <form action ="connexion.php"  method="post">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
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

if(!$user){
  print "<script>
  Swal.fire({
    position: 'center',
    icon: 'error',
    title: 'Error !',
    showConfirmButton: false,
    timer: 1500
  })
  
  </script>";
}


?>


 
</html>