<?php
      session_start();
      include "../../ins/functions.php";
      if(isset($_POST['btnsub'])){

        changerEtatPanier($_POST);

      }

     

     
      $paniers= getAllBasket();
      $commandes=getAllCommandes();
      if(isset($_POST['btnsearch'])){
        if($_POST['etat']=="tout"){
          $paniers=getAllBasket();  
        }else{
          $paniers=searchByState($paniers,$_POST['etat']);
        }

      

      }
?>      
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin : Baskets </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Best-SHOP</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
     <?php 
        include"../template/navigation.php";
     ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Baskets </h1>
            

           
          </div>

       <div> 
             
       <form action="liste.php" method="POST">
         <div class="form-group d-flex">
          <select name="etat" class="form-control">
            <option value=""> -- Choose state --</option>
            <option value="tout">All</option>
            <option value="en cours">In progress</option>
            <option value="in delivery">In delivery</option>
            <option value="delivered">Delivered</option>
            
          </select>
           
          <input type="submit" class="btn btn-primary mx-2" name="btnsearch" value="Search" />

         </div>
         
      </form>


            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
      <th scope="col">State</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
          $i=0;
          foreach($paniers as $p){
               $i++;
               print'<tr>
               <th scope="row">'.$i.'</th>
               <td>'.$p['nom'].' '.$p['prenom'].'</td>
               <td>'.$p['total'].' DT</td>
               <td>'.$p['date_cr'].'</td>
               <td>'.$p['etat'].'</td>
               <td>
                  <a  class="btn btn-success" data-toggle="modal" data-target="#Commandes'.$p['id'].'">Display</a>
                  <a class="btn btn-primary" data-toggle="modal" data-target="#traiter'.$p['id'].'">Handle</a>
                 </td>
             </tr>';
           }
      ?>
    
    
  </tbody>
</table>
 


            </div>


          
        </main>
      </div>
    </div>
    <?php
  foreach($paniers as $index => $p ){ ?>
     <!-- Modal (Edit)-->
<div class="modal fade" id="Commandes<?php echo $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Orders list</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($commandes as $index => $c){
                           if($c['panier']==$p['id']){
                            print'
                            <tr>
                            <td>'.$c['nom'].'</td>
                            <td><img src="../../image/'.$c['image'].'" / width="100"></td>
                            <td>'.$c['quantite'].'</td>
                            <td>'.$c['total'].' DT</td>
                            
                            </tr>
                            
                            ';
                           }
                        }
                    
                    ?>
                </tbody>
            </table>
       </div>
  </div>
  </div>
</div>



<?php
  }
  foreach($paniers as $index => $p ){ ?>
     <!-- Modal (Edit)-->
  <div class="modal fade" id="traiter<?php echo $p['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Handle orders</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">
              
              

              <form action="liste.php" method="POST">
              <input type="hidden" value="<?php echo $p['id']; ?>" name="panier_id">
              <div class="form-group">
                   <select name="etat" class="form-control">
                     
                     <option value="in delivery">In delivery</option>
                     <option value="delivered">Delivered</option>
                   </select>
              </div>

              <div class="form-group mt-2">
                  <button type="submit" class="btn btn-primary" name="btnsub">submit</button>
              </div>
                   
                  

              </form>
         </div>
    </div>
    </div>
  </div>
  <?php
  }
?>

  



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      function popUpDeleteCategorie(){
        return confirm("confirm Deletion!");
      } 
    </script>
  </body>
</html>