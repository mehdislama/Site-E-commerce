<?php

session_start();

//recuperation des donner du formulaire

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur =$_POST['createur'];
$categorie = $_POST['categorie'];

//upload image

$target_dir = "../../images/"; // dossier win chnhot l'image
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = $_FILES["image"]["name"];
    } else {
    echo "Sorry, there was an error uploading your file.";
  }
$date = date('Y-m-d');
//la connexion :
include "../../inc/fonction.php";
$conn = connct();

try {
    //creation de la requette

    $requette = "INSERT INTO produit(nom,description,prix,image,categorie,createur,date_creation) VALUES ('$nom','$description','$prix','$image','$categorie','$createur','$date')";

    //execution de la requette
    $resultat=$conn->query($requette);

if($resultat){
    header('location:liste.php?ajout=ok');
}



} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    if($e->getcode()==23000);{
        header('location:liste.php?erreur=duplicate');
       
    }


}
  


?>