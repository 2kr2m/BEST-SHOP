
<?php


session_start();
include "ins/functions.php";
$categories=getCategories();

if(!empty($_POST)){
    //echo $_POST['search'];
    $produits=searchProduits($_POST['search']);
}else{
    $produits=getProduit();
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

      <div class="row col-12 mt-4">

      <?php

             foreach($produits as $produit){

                print '<div class="col-3 mt-2">
                <div class="card" style="width: 18rem;">
                    <img src="image/'.$produit['image'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">'.$produit['nom'].'</h5>
                      <p class="card-text">'.$produit['description'].'</p>
                      <a href="produit.php?id='.$produit['id'].'" class="btn btn-primary">Afficher</a>
                    </div>
                  </div>
    
              </div>';
             }
      ?>
          
      </div>

    <?php
        include "ins/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>