<?php
    session_start();   
    $id=$_POST['idp'];
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
    $categorie=$_POST['categorie'];
    $date_mod=date("y-m-d");
    include "../../ins/functions.php";
    $conn= connect();
    $requette= "UPDATE produit SET nom='$nom' , description='$description' , prix='$prix' , categorie='$categorie' , date_mod='$date_mod' WHERE id='$id'";
    $resultat = $conn->query($requette);
    if($resultat){
        header('location:liste.php?edit=ok');
    }


?>