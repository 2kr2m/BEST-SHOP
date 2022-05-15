<?php
 
 $idcategorie = $_GET['idc'];

 include "../../ins/functions.php";

 $conn=connect();

 $requette = "DELETE FROM categorie WHERE id='$idcategorie'";

 $resultat=$conn->query($requette);

 if($resultat){
     header('location:list.php?delete=ok');
 }

?>