<?php 
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="shortcut icon" href="img/logo1.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<script>
    history.pushState(null, null, null);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, null);
    });
</script>
  <title>Gestion Licence</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block text-center ">
                <img src="img/logo1.png" width="400px" height="350px" style="text-align: center;">
                <img src="img/logo2.png" width="400px" height="100px" style="text-align: center;">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenue!</h1>
                  </div>
                  <form class="user" method="get" action="login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp"  <?php if (isset($_GET['email'])) { ?>  value=" <?php echo($_GET['email']); ?> " <?php }
                      else { ?>
                        placeholder="Enter Email Address..."
                      <?php
                      };



                       ?>
                        >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" id="exampleInputPassword" placeholder="Password" >
                    </div>
                    <div class="form-group">
                     
                    </div>
                    <button class="btn btn-primary btn-user btn-block">
                      Login </button>
                    <div class="text-center">
                    <a class="small" href="recuppasse.php">Mot De Passe Oublié?</a>
                  </div>
                    <hr>
                     
                  </form>
                  <?php 
                  
                  
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";          

if(strpos($fullUrl, "erreur=pass") == true) {
    echo "<h6 class='text-center text-danger'> Mot de passe incorrect!</h6>";
}
if(strpos($fullUrl, "erreur=vide") == true) {
    echo "<h6 class='text-center text-danger'> Veuillez Remplire Votre Email Et Mot De Passe!</h6>";
}
if(strpos($fullUrl, "erreur=email") == true) {
    echo "<h6 class='text-center text-danger'> Email introuvable!</h6>";
}
if(strpos($fullUrl, "erreur=access") == true) {
    echo "<h6 class='text-center text-danger'> Veuillez connecte!</h6>";
}

    ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
