
<?php

session_start();

include "ins/functions.php";
$categories=getCategories();

if(isset($_GET['id'])){
    $produit=getProduitById($_GET['id']);
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
    
        <?php if(isset($_SESSION['etat']) && $_SESSION['etat'] == 0){  
            print'<div class="alert alert-danger">
            Not validated account
            
            </div>';
        
        } 
            
            ?>

    </div>

      <div class="row col-12 mt-4">
           <div class="card col-8 offset-2" >
                <img src="image/<?php echo $produit['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
                    <p class="card-text"><?php echo $produit['description'] ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $produit['prix'] ?> DT</li>
                    <?php

                        foreach($categories as $index => $c){
                            if($c['id'] == $produit['categorie']){
                               print'<button  class="btn btn-success mb-2" >'.$c['nom'].'</button>';
                            }
                        }

                    ?>
                   
                   
                </ul>
                <div class="col-12 mt-2">
                    <form action="actions/commander.php" method="POST" class="d-flex">
                       <input type="hidden" value="<?php echo $produit['id'] ?>" name="produit">
                       <input type="number" step="1" name="quantite" class="form-control" placeholder="Quantity of product">
                       <button type="submit" <?php if(isset($_SESSION['etat']) && $_SESSION['etat'] == 0){  echo "disabled";} ?> class="btn btn-primary">Order</button>

                     </form>
                </div>
          
                
           </div>
          
      </div>
      
      
      <?php
        include "ins/footer.php";
    ?>

</body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>