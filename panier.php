
<?php


session_start();
include "ins/functions.php";

$total_panier=$_SESSION['panier'][1];
$categories=getCategories();

if(!empty($_POST)){
    //echo $_POST['search'];
    $produits=searchProduits($_POST['search']);
}else{
    $produits=getProduit();
}

$commandes=array();
if(isset($_SESSION['panier'])){
    if( count($_SESSION['panier'][3])>0){
        $commandes=$_SESSION['panier'][3];
    }
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

<?php

include "ins/header.php";



?>

      <div class="row col-12 mt-4 p-5" >

        <h1>Panier </h1>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
         foreach($commandes as $index=> $commande){
             print'<tr>
             <th scope="row">'.($index+1).'</th>
             <td>'.$commande[5].'</td>
             <td>'.$commande[0].' pieces</td>
             <td>'.$commande[1].' DT</td>
             <td><a href="actions/delete-from-panier.php?id='.$index.'" class="btn btn-danger">Delete</a></td>
           </tr>';
         }
    ?>
    

  </tbody>
</table>
<div class="text-end mt-3">
         <h3>Total: <?php echo $total_panier; ?> DT</h3>
         <hr />
         <a href="actions/valider-panier.php" class="btn btn-success" style="width: 100px;">Validate</a>    
</div>

        
          
      </div>

    <?php
        include "ins/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>