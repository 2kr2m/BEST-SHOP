<?php
 session_start();
 $idpan = $_GET['id'];

 $tot_del=$_SESSION['panier'][3][$idpan][1];
 $_SESSION['panier'][1] -= $tot_del;

 unset($_SESSION['panier'][3][$idpan]);

 header("location:../panier.php");

 
?>