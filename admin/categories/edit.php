<?php
    session_start();   
    $id=$_POST['idc'];
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $date_mod=date("y-m-d");
    include "../../ins/functions.php";
    $conn= connect();
    $requette= "UPDATE categorie SET nom='$nom' , description='$description' , date_mod='$date_mod' WHERE id='$id'";
    $resultat = $conn->query($requette);
    if($resultat){
        header('location:list.php?edit=ok');
    }


?>