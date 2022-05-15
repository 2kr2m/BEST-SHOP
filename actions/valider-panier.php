<?php 
session_start();

include "../ins/functions.php";

 $conn=connect();

 $visiteur=$_SESSION['id'];
 $total=$_SESSION['panier'][1];
 $date=date('y-m-d');

 $requette_pan="INSERT INTO panier(visiteur,total,date_cr) VALUES ('$visiteur','$total','$date')";
 $resultat=$conn->query($requette_pan);

 $panier_id=$conn->lastInsertId();

 $commandes=$_SESSION['panier'][3];

 foreach($commandes as $commande){
    $quantite=$commande[0];
    $total=$commande[1];
    $idpr=$commande[4];
    $requette1="INSERT INTO commande (produit,total,quantite,panier,date_cr,date_mod) VALUES ('$idpr','$total','$quantite','$panier_id','$date','$date' )";
    $resultat1=$conn->query($requette1);
 }

 $_SESSION['panier']=null;
 header('location:../index.php');





?>