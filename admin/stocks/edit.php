<?php
    session_start();   
    $id=$_POST['ids'];
    $quantite=$_POST['quantite'];
   
    $date_mod=date("y-m-d");
    include "../../ins/functions.php";
    $conn= connect();
    $requette= "UPDATE stock SET quantite='$quantite', date_mod='$date_mod' WHERE id='$id'";
    $resultat = $conn->query($requette);
    if($resultat){
        header('location:liste.php?edit=ok');
    }


?>