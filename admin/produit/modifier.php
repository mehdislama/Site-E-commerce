
<?php



session_start();

//recuperation des donner du formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur =$_POST['createur'];
$categorie = $_POST['categorie'];


//la connexion :
include "../../inc/fonction.php";
$conn = connct();

//creation de la requette
$requette = "UPDATE categories SET nom='$nom', description = '$desc', date_modification='$date_modification' WHERE id= '$id'";

//execution de la requette
$resultat=$conn->query($requette);
if($resultat){
    header('location:liste.php?modification=ok');
}






?>

