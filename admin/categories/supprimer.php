<?php

//echo "id de categorie ".$_GET['id-cat'];

$idc = $_GET['id-cat'];


include "../../inc/fonction.php";
$conn=connct();

$requette = "DELETE FROM categories WHERE id='$idc'";

$result = $conn->query($requette);

if($result){
    header('location:liste.php?delete=ok');
}

?>
