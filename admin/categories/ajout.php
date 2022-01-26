<?php



session_start();

//recuperation des donner du formulaire
$nom = $_POST['nom'];
$desc = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation=date("Y-m-d");

//la connexion :
include "../../inc/fonction.php";
$conn = connct();

 //creation de la requette
try {
    $requette = "INSERT INTO categories(nom,description,createur,date_creation) VALUES ('$nom','$desc','$createur','$date_creation')";

    //execution de la requette
    $resultat=$conn->query($requette);
if($resultat){
    header('location:liste.php?ajout=ok');
}


   

} catch(PDOException $e) {
    //echo "Connection failed: " . $e->getMessage();
    if($e->getcode()==23000);{
        header('location:liste.php?erreur=duplicate');
    }


}
  






?>

