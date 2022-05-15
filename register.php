<?php
  session_start();

  if(isset($_SESSION['nom'])){
      header('location:profile.php');
  }



include "ins/functions.php";

$categories=getCategories();
$showRegistrationAlert=0;
if (!empty($_POST)){
  if (AddVisiteur($_POST)){
    $showRegistrationAlert=1;
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
    <link rel="stylsheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css">
</head>
<body>


<?php

      include "ins/header.php";
      


  ?>
                            <!--fin nav-->

      
      <div class="col-12 p-5">
        <h1 class="text-center">Register</h1>
        <form action="register.php" method="POST"> 
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Last Name</label>
              <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
            </div>
            
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Name</label>
              <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Phone Number</label>
              <input type="text" name="telephone" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>






                            <!--footer-->
                            <?php
                                     include "ins/footer.php";
                            ?>

      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>



<?php

if($showRegistrationAlert==1){
  print "<script>
  Swal.fire({
  title: 'Success!',
  text: 'Account created',
  icon: 'success',
  confirmButtonText: 'Cool',
  timer:3000
  })
  </script> ";
}


?>
 
</html>