<?php
 
 $idproduit = $_GET['idp'];

 include "../../ins/functions.php";

 $conn=connect();

 $requette = "DELETE FROM produit WHERE id='$idproduit'";

 $resultat=$conn->query($requette);

 if($resultat){
     header('location:liste.php?delete=ok');
 }

?>