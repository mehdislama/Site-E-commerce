<?php

function connct(){
  $DBuser = "root";
$DBmdps = "";
$DBname = "ecommerce";
$servername="localhost";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBmdps);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  return $conn;

}

function getAllcategories(){

    $conn=connct();

//creation de la requete

$requette = "SELECT * FROM categories";

//execution de la requtte
$result = $conn->query($requette);

//result de requtte
$categories = $result->fetchAll();

return $categories;
}

function getAllproduit(){
  $conn=connct();
    
    //creation de la requete
    
    $requette = "SELECT * FROM produit";
    
    //execution de la requtte
    $result = $conn->query($requette);
    
    //result de requtte
    $produits = $result->fetchAll();
    
    return $produits;

}

function searchProduit($rech){
  $conn=connct();
  
  //creation de la requete
  
  $requette = "SELECT * FROM produit where nom like '%$rech%'";
  
  //execution de la requtte
  $result = $conn->query($requette);
  
  //result de requtte
  $produits = $result->fetchAll();
  
  return $produits;


}

function getProduitById($id){

  $conn = connct();

  $requette= "SELECT * FROM produit WHERE id = $id";
 //execution de la requtte
  $result = $conn->query($requette);
    
  //result de requtte
  $produit = $result->fetch();
  
  return $produit;

}
function AddVisiteur($data){
  $con = connct();
  $mdpsHash = md5($data['pass']);
  
  $requette = "INSERT INTO visiteur(nom,prenom,email,tel,pass) VALUES ('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$data['tel']."','".$mdpsHash."')";

  $result = $con->query($requette);

  if($result){
  return true;
  }else {
    return false;
  }
}

function ConnectVisiteur($data){
  $con = connct();

  $email = $data['email'];
  
 $mdps = md5($data['pass']);
  //$mdps = $data['pass'];
  echo $mdps;
  $requette = "SELECT * FROM visiteur WHERE email = '$email' AND pass = '$mdps' ";

  $resultat = $con->query($requette);

  $user = $resultat->fetch();

 return $user;

}

function ConnectAdmin($data){
  $con = connct();

  $email = $data['email'];
  
 $mdps = md5($data['pass']);

  //$mdps = $data['pass'];
  $requette = "SELECT * FROM administrateur WHERE email = '$email' AND mdps = '$mdps' ";

  $resultat = $con->query($requette);

  $user = $resultat->fetch();

 return $user;

}
function getAllUsers(){
  $con = connct();

  $requette = "SELECT * FROM visiteur WHERE etat=0";

  $resultat = $con->query($requette);

  $user = $resultat->fetchAll();
  return $user;
}

?>