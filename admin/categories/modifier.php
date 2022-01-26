<?php



session_start();

//recuperation des donner du formulaire

$id = $_POST['idc'];
$nom = $_POST['nom'];
$desc = $_POST['description'];

$date_modification=date("Y-m-d");

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

