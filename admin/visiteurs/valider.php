<?php

$idvisiteur=$_GET['id'];
include "../../ins/functions.php";
$conn= connect();
$requette= "UPDATE visiteurs SET etat=1 WHERE id='$idvisiteur'";
$resultat = $conn->query($requette);
if($resultat){
    header('location:liste.php?valider=ok');
}else{
    echo "Error! Something went wrong";
}


?>