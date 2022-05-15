<?php
  session_start();

  if(isset($_SESSION['nom'])){
      //header('location:compte.php');
  }



include "../ins/functions.php";

$user=true;
if (!empty($_POST)){
  $user = ConnectAdmin($_POST);
  if ($user != null) {
    session_start();
   
    $_SESSION['id'] = $user['id'];
     $_SESSION['email'] = $user['email'];
     $_SESSION['nom'] =$user['nom'];
     $_SESSION['mp'] = $user['mp'];
     

     header('location:compte.php'); 
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
 
    
                            <!--fin nav-->

      
      <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin : Connection</h1>
        <form action="login.php" method="post">
            <div class="mb-3" >
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
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
        include "../ins/footer.php";
    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>



<?php

if(!$user){
  print "<script>
  Swal.fire({
  title: 'Error!',
  text: 'Account Not Found !',
  icon: 'error',
  confirmButtonText: 'OK',
  timer:3000
  })
  </script> ";
}


?>
</html>