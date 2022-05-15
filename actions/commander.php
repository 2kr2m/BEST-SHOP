<?php
session_start();

if(!isset($_SESSION['nom'])){
     header('location:../connexion.php');
     exit();
 }

include "../ins/functions.php";

 $conn=connect();

 $visiteur = $_SESSION['id'];




 $idpr= $_POST['produit'];
 $quantite= $_POST['quantite'];

// $conn=connect();
 $requette="SELECT prix,nom from produit WHERE id='$idpr'";
 $resultat=$conn->query($requette);
 $prod=$resultat->fetch();
 $total=$prod['prix'] * $quantite;
 $date=date("y-m-d");

 if(!isset($_SESSION['panier'])){
     $_SESSION['panier']=array($visiteur,0,$date,array());
 }
 $_SESSION['panier'][1] +=$total;
 
 $_SESSION['panier'][3][] = array($quantite,$total,$date,$date,$idpr,$prod['nom']);


header('location:../panier.php')

?>