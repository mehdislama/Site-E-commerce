<?php
session_start();

include "../../inc/fonction.php";
$categories = getAllcategories();
$produit = getAllproduit();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin Profil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bitnami.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
      <?php 
       include "../template/navigation.php";
      ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Listes des Produits</h1>
           
           <div>

           <a href="#" class = "btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>

           </div>

           
           </div>

       
      
    <div>
    <?php
       if(isset($_GET['ajout']) && $_GET['ajout']== 'ok'){
         print'<div class="alert alert-success">
         Produit ajouter avec SUCCEES !
    </div>';
       }
       ?>

<?php
       if(isset($_GET['delete']) && $_GET['delete']== 'ok'){
         print'<div class="alert alert-success">
         Produit supprimer avec SUCCEES !
    </div>';
       }
       ?>

<?php
       if(isset($_GET['modification']) && $_GET['modification']== 'ok'){
         print'<div class="alert alert-success">
         Produit modifiee avec SUCCEES !
    </div>';
       }
       ?>

<?php
       if(isset($_GET['erreur']) && $_GET['erreur']== 'duplicate'){
         print'<div class="alert alert-danger">
         Produit existe deja !
    </div>';
       }
       ?>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOM</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>

  <?php
 
        foreach($produit as $i=> $prod){
            
           print' <tr>
            <th scope="row">'.$i.'</th>
            <td>'.$prod['nom'].'</td>
            <td>'.$prod['description'].'</td>
            <td>
            
                  <a data-toggle="modal" data-target="#editModel'.$prod['id'].'" class = "btn btn-success">Modififer</a>
                  <a  href="supprimer.php?id-cat='.$prod['id'].'"class = "btn btn-danger">Supprimer</a>
            
            </td>';
        }
  ?>
    
    </tr>
   
  </tbody>
</table>

           </div>
          </div>
        </main>
      </div>
    </div>




<!-- Modal-Ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout Produit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="nom" required class="form-control" placeholder="Nom de produit :">
            </div>
            <div class="form-group">
                <textarea  name="description" required class="form-control" placeholder="Description de produit :"></textarea>
            </div>
            <div class="form-group">
                <input type="number" step="0.01" name="prix" required class="form-control" value ="<?php echo $categorie['nom'] ;?>" placeholder="Prix de produit :">
            </div>
            <div class="form-group">
                <input type="file" name="image" required class="form-control" placeholder="Image de produit :">
            </div class="form-group">
              <select name="categorie" class="form-control">
              <?php
                        foreach($categories as $index=> $categorie){
                              print'<option value="'.$categorie['id'].'">'.$categorie['nom'].'</option>';

                        }

              ?>
              </select>
            <div>
              <input type="hidden" name="createur" value="<?php echo $_SESSION['id'] ?>">

            </div>
        
            <div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php

            foreach($categories as $index=> $categorie){  ?>


<!-- Modal-Modification -->
<div class="modal fade" id="editModel<?php echo $categorie['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Modifier Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="modifier.php" method="post">
              <input type="hidden" value = "<?php echo $categorie['id']; ?>" name = "idc"/>
            <div class="form-group">
                <input type="text" name="nom" required class="form-control" value ="<?php echo $categorie['nom'] ;?>" placeholder="nom de categorie :">
            </div>
            <div class="form-group">
                <textarea  name="description" required class="form-control"  placeholder="description de categorie :"><?php echo $categorie['description'] ;?></textarea>
            </div>
            
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php

              
          }
?>
<!-- Modal-Modification -->
<div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Modifier Categorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post">
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="nom de categorie :">
            </div>
            <div class="form-group">
                <textarea  name="description" class="form-control" placeholder="description de categorie :"></textarea>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  </body>
</html>