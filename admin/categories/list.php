<?php
      session_start();
      include "../../ins/functions.php";
      $categorie= getCategories();
?>      
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin : profile </title>

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
            <h1 class="h2">All Categories</h1>
            
            <div>
               <a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add</a>
          
            </div> 
           
          </div>

          <div> 
          <?php if(isset($_GET['ajout']) && $_GET['ajout']=="ok"){     
        print'  <div class="alert alert-success">
        New Category was added successfully
  </div> ';
        } 
          ?> 
          <?php if(isset($_GET['delete']) && $_GET['delete']=="ok"){     
        print'  <div class="alert alert-success">
        Category was deleted successfully
  </div> ';
        } 
          ?> 
              <?php if(isset($_GET['edit']) && $_GET['edit']=="ok"){     
        print'  <div class="alert alert-success">
        Category was updated successfully
  </div> ';
        } 
          ?> 
          <?php if(isset($_GET['erreur']) && $_GET['erreur']=="ok"){     
        print'  <div class="alert alert-danger">
        name of Category is already exists!
  </div> ';
        } 
          ?>
            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <?php
          $i=0;
          foreach($categorie as $c){
              $i++;
              print'<tr>
              <th scope="row">'.$i.'</th>
              <td>'.$c['nom'].'</td>
              <td>'.$c['description'].'</td>
              <td>
                  <a  class="btn btn-success" data-toggle="modal" data-target="#editModal'.$c['id'].'">Edit</a>
                  <a onclick="return popUpDeleteCategorie()" href="supprimer.php?idc='.$c['id'].'" class="btn btn-danger">Delete</a>
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

<!-- Modal (Add)-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="ajout.php" method="post">
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="name...">

            </div>
            <div class="form-group">
                <textarea  name="description" class="form-control" placeholder="description..."></textarea>

            </div>
        
      </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
  </div>
</div>

<?php
  foreach($categorie as $index => $categorie ){ ?>

    <!-- Modal (Edit)-->
<div class="modal fade" id="editModal<?php echo $categorie['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="edit.php" method="post">
            <input type="hidden" value="<?php echo $categorie['id']; ?>" name="idc" />
            <div class="form-group">
                <input type="text" name="nom" class="form-control" value="<?php echo $categorie['nom']; ?>" placeholder="name...">

            </div>
            <div class="form-group">
                <textarea  name="description" class="form-control" placeholder="description..."><?php echo $categorie['description']; ?> </textarea>

            </div>
        
      </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button  type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
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