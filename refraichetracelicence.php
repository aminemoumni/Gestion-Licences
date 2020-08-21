<?php
session_start();
if (!isset($_SESSION['EmailAgent'])) {
  header("Location: index.php?erreur=access");
}
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
if (isset($_GET['search'])) 
  $req = "select IdTraceLicence, IdLicence, NomClient, LibelleProduit, LibelleTypeLicence, Garantie, DateDebut, DateFin, NomAgent, PrenomAgent, NomEnregistrement, NomContactClient, Numerodeserie
from tracelicence NATURAL JOIN agent NATURAL JOIN client NATURAL JOIN contactclient NATURAL JOIN produit NATURAL JOIN typelicence WHERE 
LibelleProduit  LIKE '%" . $_GET['search'] . "%' 
or NomClient like '%" . $_GET['search'] . "%'
or DateFin like '%" . $_GET['search'] . "%'
or DateDebut like '%" . $_GET['search'] . "%'
or Numerodeserie like '%" . $_GET['search'] . "%'
or LibelleTypeLicence like '%" . $_GET['search'] . "%'



 AND Validation = 'Active'";
$resu = $pdo->query($req);
$affi = $resu->fetchAll(PDO::FETCH_OBJ);
;?>
<style>
<?php
include 'style.css';
?>
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="img/logo1.png">
<script type="text/javascript">
  $(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"refraiche.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});

function showRow(row) {
  var x=row.cells;
  document.getElementById("cutsC").value = x[0].innerHTML;
  document.getElementById("cutsP").value = x[1].innerHTML;
  document.getElementById("cutsD").value = x[2].innerHTML;
  document.getElementById("cutsF").value = x[3].innerHTML;
}
</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion Licences</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
 <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">
          <img src="img/logo1.png" width="30px">
        </div>
        <div class="sidebar-brand-text mx-3"> Bienvenue</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="acceuil.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder"></i>
          <span>Licences</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a href="#"><h6 style="color: black;" class="collapse-header">Licences:</h6></a>
            <a class="collapse-item" href="ajoutlicence.php">Ajouter une licence</a>
              <a class="collapse-item" href="tabletypelicence.php">Les types licence</a>
            
          </div>
        </div>
      </li>

      <!-- Nav Item - Agents Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="  fas fa-address-card"></i>
          <span>Agents</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a href="tableagent.php"><h6 style="color: black;" class="collapse-header">Agents:</h6></a>
            <a class="collapse-item" href="ajoutagent.php">Ajouter un agent</a>
             <?php if ($_SESSION['EmailAgent'] != 'admin' && $_SESSION['PasswordAgent'] != 'admin') {
                        
                      
                      ?>
            <a class="collapse-item" href="modifieragent.php">Modfier votre information</a> <?php } ?>
            
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-male"></i>
          <span>Client</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a href="tableclient.php"><h6 style="color: black;" class="collapse-header">Client:</h6></a>
            <a class="collapse-item" href="ajoutclient.php">Ajouter un client</a>
            <a class="collapse-item" href="ajoutcontactclient.php">Ajouter un contact client</a>
            <a class="collapse-item" href="tablecontactclient.php">Les contacts client</a>
         
          </div>
        </div>
      </li>
<!-- Nav Item - Produit Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduit" aria-expanded="true" aria-controls="collapseProduit">
          <i class="fas fa-fw fa-folder"></i>
          <span>Produit</span>
        </a>
        <div id="collapseProduit" class="collapse" aria-labelledby="headingProduit" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a href="tableproduit.php"><h6 style="color: black;" class="collapse-header">Produit:</h6></a>
            <a class="collapse-item" href="ajoutproduit.php">Ajouter un produit</a>
            
            
          </div>
        </div>
      </li>
    

      <!-- Heading -->
      

      <!-- Nav Item - Pages Collapse Menu -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="refraichetracelicence.php">
            <div class="input-group">
              <input style=" display: block;" type="text" name="search" id="search" id="dropdownMenuButton" class="form-control bg-light border-0 small" placeholder="Recherche Trace Licence..." aria-label="Search" aria-describedby="basic-addon2">

              <div class="input-group-append">
                <button class="btn btn-primary" >
                  <i class="fas fa-search fa-sm"></i>
                </button>

              </div>
            
            </div> 
          
         
          </form>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
<?php if ($_SESSION['Admin'] == 'Admin') { ?>
  

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="admin.php" title="Trace Licence Modifier" id="messagesDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-file-contract"></i>
                <!-- Counter - Messages -->
                
              </a>
              <!-- Dropdown - Messages -->
              
            </li>
<?php } ?>
            <!-- Nav Item - Alerts -->
           <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="" title="Supprimer Licences Expire" data-toggle="modal" data-target="#exampleModal" id="messagesDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-trash-alt"></i>
                <!-- Counter - Messages -->
                
              </a>
              <!-- Dropdown - Messages -->
              
            </li>
            
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer Tout Les Licences Expire</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Férmer</button>
        <a href="supprimerancienlicence.php"><button type="button" class="btn btn-danger">Supprimer</button></a>
      </div>
    </div>
  </div>
</div>
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="licenceexpire.php" title="Licences Expires" id="messagesDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ban"></i>
                <!-- Counter - Messages -->
                
              </a>
              <!-- Dropdown - Messages -->
              
            </li>
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="remind.php" title="Verifier Expiration Licence" id="messagesDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                
              </a>
              <!-- Dropdown - Messages -->
              
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span style=" margin-top: 15%; " class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ($_SESSION['NomAgent']);echo" "; echo ($_SESSION['PrenomAgent']);echo"</br>";echo "<p style = 'font-size:9px;' class='text-center'>" . $_SESSION['date'] . ""; echo "<br>" . $_SESSION['time'] . "</p>";  ?></span>
                <img class="img-profile rounded-circle" src="img/logo1.png ">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a href="deconnexion.php" class="dropdown-item"  >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        
           

        <!-- Begin Page Content -->

<div class="container">
    <div class="custyle">
    <table class="table table-striped custab text-center">
    
        <tr>
            <th class='tr1' >Client</th>
            <th class='tr1' >Produit</th>
            <th class='tr1'>Date Début </th>
            <th class='tr1' >Date Fin </th>
            <th class="text-center">Action</th>
        </tr>
   
              <?php  
              if (empty($affi))
               echo " <tr>
              
              <td class='tr1'>NO RESULTAT</td>
              <td class='tr1'>NO RESULTAT</td>
              <td class='tr1'>NO RESULTAT</td>
              <td class='tr1'>NO RESULTAT</td>
              <td class='tr1'>NO RESULTAT</td>
              



              </tr>";
              else
       foreach ($affi as $dat)
      
        
      
      echo "<tr>
        <td class='tr1'>"
           . $dat->NomClient .
        "</td>
        <td class='tr1'>"
           . $dat->LibelleProduit .
        "</td>
        
        
        <td class='tr1'>"
          . $dat->DateDebut .
        "</td>
        <td class='tr1'>"
           . $dat->DateFin .
        "</td>
        
         <td class='text-center'><a class='btn btn-info btn-xs' href='plusinfotrace.php?id=$dat->IdTraceLicence'><span class='glyphicon glyphicon-edit'></span>Plus Info</a> "
        ?>
          <tbody id="result">
            
          </tbody>  
    </table>
    </div>
</div>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="search.js"></script>
<script src="js/jquery-1.11.3-jquery.min.js"></script>     

<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
</body>

</html>
 




