<?php
    session_start();   
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $date_cr=date("y-m-d");
    include "../../ins/functions.php";
    $conn= connect();
    $requette= "INSERT INTO categorie(nom,description,date_cr) VALUES ('$nom','$description','$date_cr')";
    $resultat = $conn->query($requette);
    if($resultat){
        header('location:list.php?ajout=ok');
    }


?>