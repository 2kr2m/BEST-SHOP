<?php
    session_start();   
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    
    $prix=$_POST['prix'];
    $categorie=$_POST['categorie'];
    $quantite=$_POST['quantite'];
    $date_cr1=date("y-m-d");
    //  upload img
$target_dir = "../../image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
   $image= $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

$date_cr=date("y-m-d");
    include "../../ins/functions.php";
    $conn= connect();
    try{
    $requette= "INSERT INTO produit(nom,description,prix,image,categorie,date_cr) VALUES ('$nom','$description','$prix','$image','$categorie','$date_cr')";
    
    $resultat = $conn->query($requette);
    
    if($resultat){
        $prod_id=$conn->lastInsertId();
        $requette2= "INSERT INTO stock(produit,quantite,date_cr) VALUES ('$prod_id','$quantite','$date_cr1')";
    
    
      if($conn->query($requette2)){
        header('location:liste.php?ajout=ok');
      }else{
          echo "Stock of product can't be added !";
      }
    }

    }catch(PDOException $e){
           if($e->getCode() == 2300){
               header('location:liste.php?erreur=duplicate');
           }    } 


?>