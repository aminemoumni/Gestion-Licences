<?php
session_start();
if (!isset($_SESSION['EmailAgent'])) {
  header("Location: index.php?erreur=access");
}
?>
<style>
<?php
include 'style.css';
?>
</style>
<?php
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$requete = "select * from produit";
$resultat = $pdo->query($requete);
$metier = $resultat->fetchAll(PDO::FETCH_OBJ);
$requete1 = "select * from typelicence";
$resultat1 = $pdo->query($requete1);
$type = $resultat1->fetchAll(PDO::FETCH_OBJ);
$requete2 = "select * from agent";
$resultat2 = $pdo->query($requete2);
$agent = $resultat2->fetchAll(PDO::FETCH_OBJ);
$requete3 = "select * from client";
$resultat3 = $pdo->query($requete3);
$client = $resultat3->fetchAll(PDO::FETCH_OBJ);
$requete4 = "select * from licence NATURAL JOIN agent NATURAL JOIN client NATURAL JOIN contactclient NATURAL JOIN produit NATURAL JOIN typelicence WHERE IdLicence =" . $_GET['id'] . "";
$resultat4 = $pdo->query($requete4);
$licence = $resultat4->fetchAll(PDO::FETCH_OBJ);

foreach ($licence as $key) 


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

  <title>Gestion Licences</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="js/jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'call_ajax.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
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

      <!-- Nav Item - Pages Collapse Menu -->
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="refraiche.php">
            <div class="input-group">
              <input style=" display: block;" type="text" name="search" id="search" id="dropdownMenuButton" class="form-control bg-light border-0 small" placeholder="Recherche Licence..." aria-label="Search" aria-describedby="basic-addon2">

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
        
        <div class="container" style="min-height: 100px; margin-top: 4%;">
			<div class="main">
				<div class="main-center">
					
					
				<h3 class="deb3">Modifier la Licence <?php echo($key->LibelleProduit);?></h3>
					<form class="" method="get" action="modifierlicph.php">
            <input type="hidden" class="form-control" value="<?php echo($key->IdLicence);?>" name="id" placeholder="Par Mois"/>
             <div class="form-row">
              <div class="form-group col">
              <label for="La Date de Fin">Client final</label>
                <div class="input-group">
                  <select class="form-control" name="NomEnregistrement" id="country" class="tg"  >
                    <option value="<?php echo($key->IdClient);?>"> <?php echo($key->NomClient);?></option>
     <?php  
     foreach ($client as $clientt)
     if ($key->IdClient != $clientt->IdClient) {
      echo "<option value=" . $clientt->IdClient . ">" . $clientt->NomClient . "</option>"; }
      ?>
                </select>
                </div>
            </div>
            <div class="form-group col">
              <label for="entreprise"> Contact client</label>
                <div class="input-group">
                  <select class="form-control" name="contact"  class="tg" id="state" >
                    <option value="<?php echo($key->IdContactClient);?>"> <?php echo($key->NomContactClient);?></option>

                </select>
                  
              </div>
            </div>
          </div>
          <div class="form-group">
              <label for="La Date de Fin">Référence marché/BC</label>
                <div class="input-group">
                  
                  <textarea type="text" class="form-control" name="ref" placeholder="Reference marché/BC"><?php echo($key->ReferenceMarche); ?></textarea>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col">
              <label for="La Date de Fin">Personne concernée</label>
                <div class="input-group">
                  
                 <select class="form-control" name="agent" id="metiers" class="tg" id="txtville" >
                    <option value="<?php echo($key->IdAgent);?>"> <?php echo($key->NomAgent); echo" "; echo($key->PrenomAgent);?></option>
     <?php  
     foreach ($agent as $data)
      if ($key->IdAgent != $data->IdAgent) {
       
      
      echo "<option value=" . $data->IdAgent . ">" . $data->NomAgent . " " . $data->PrenomAgent . "</option>";}
      ?>
                </select>
                </div>
            </div>
            <div class="form-group col">

              <label for="LibelleProduit">Libelle produit</label>
                <div class="input-group">
                  
                  <select class="form-control" name="Libelle" id="metiers" class="tg" id="txtville" >
                    <option value="<?php echo($key->IdProduit);?>"> <?php echo($key->DesignationProduit);?></option>
     <?php  
     $b = "";
     foreach ($metier as $data)
     if ($key->IdProduit != $data->IdProduit) {
       
      echo "<option value=" . $data->IdProduit . ">" . $data->DesignationProduit . "</option>";
     $b = $data->DesignationProduit;}
      ?>
                </select>
                </div>
            </div>
          </div>
          
           <div class="form-row ">
				  <div class="form-group col">
			 				<label for="Nom de License">Type licence</label>
								<div class="input-group">
				          <select class="form-control" name="type" id="metiers" class="tg" id="txtville" >
                    <option value="<?php echo($key->IdTypeLicence);?>"> <?php echo($key->LibelleTypeLicence);?></option>
     <?php  
     foreach ($type as $typee)
      if ($key->IdTypeLicence != $typee->IdTypeLicence) {
      echo "<option value=" . $typee->IdTypeLicence . ">" . $typee->LibelleTypeLicence . "</option>";}
      ?>
                </select>
							</div>
						</div>

          
          
						<div class="form-group col">
							<label for="entreprise">Garantie</label>
								<div class="input-group">
                  <select class="form-control" name="garantie" id="metiers" class="tg" id="txtville" >
                    <option value="<?php echo($key->Garantie);?>"> <?php echo($key->Garantie);?></option>
           <option value="1 an">1 an</option>
           <option value="2 ans">2 ans</option>
           <option value="3 ans">3 ans</option>
           <option value="4 ans">4 ans</option>
           <option value="5 ans">5 ans</option>
      
                </select>
							</div>		
							</div>
						</div>
            
           
            
            <div class="form-group">
              <label for="La Date de Fin">Numero de serie</label>
                <div class="input-group">
                  
                  <textarea type="text" class="form-control" name="serie" placeholder="Metter une ; au fin de serie"><?php echo($key->Numerodeserie);?></textarea>
                </div>
            </div>
              <div class="form-row ">

            <div class="form-group col">
              <label for="La Date de Début">Date début</label>
                <div class="input-group">
                  <input type="Date" class="form-control" value="<?php echo($key->DateDebut);?>" name="dateDebut" placeholder="Email"/>
                </div>
            </div>

            <div class="form-group col">
              <label for="La Date de Fin">Date fin</label>
                <div class="input-group">
                  
                  <input type="date" class="form-control" value="<?php echo($key->DateFin);?>" name="dateFin" placeholder="Mot De Passe"/>
                </div>
            </div>
          </div>
            <div class="form-row ">
            <div class="form-group col">
              <label for="La Date de Début">Nom d'enregistrement</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="<?php echo($key->NomEnregistrement);?>" name="NomEnregistrement" placeholder="Nom Enregistrement"/>
                </div>
            </div>
          </div>
          
						<div class="btn">
				<button class="btn btn-lg btn-success"  type="submit">Modifier</button> 

						</div>
						<div class="btn2">
							<?php 
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";          

if(strpos($fullUrl, "enregistre=empty") == true) {
	echo "<h6  class='errorempty'>veuillez remplir tous les champs</h>";
}
elseif(strpos($fullUrl, "enregistre=char") == true) {
	echo "<h6 class='errorempty'>veuillez remplir Votre Nom Et Prenom Correctement</h6>";
}
elseif(strpos($fullUrl, "enregistre=mail") == true) {
	echo "<h6 class='errorempty'> Email Invalid</h6>";
}
elseif(strpos($fullUrl, "enregistre=pro") == true) {
	echo "<h4 class='errorempty'> Choissiez Un Produit</h4>";
}
elseif(strpos($fullUrl, "enregistre=typ") == true) {
  echo "<h4 class='errorempty'> Choissiez Un Type Licence</h4>";
}
elseif(strpos($fullUrl, "enregistre=change") == true) {
  echo "<h4 class='errorempty'> Aucune Modification</h4>";
}
elseif(strpos($fullUrl, "enregistre=age") == true) {
	echo "<h6 class='errorempty'> Choissiez Un Agent </h4>";
}
elseif(strpos($fullUrl, "enregistre=con") == true) {
  echo "<h6 class='errorempty'> Choissiez Un Contact Client </h4>";
}
elseif(strpos($fullUrl, "enregistre=date") == true) {
  echo "<h6 class='errorempty'> impossible d'enregistre une date expire</h6>";
}
elseif(strpos($fullUrl, "enregistre=success") == true) {

	echo "<h4 class='success'>Votre Licence " . ucwords($key->LibelleProduit) . "  Est Bien Modifie</h4>";
}

?>
						</div>
					</form>
				
				</div><!--main-center"-->
			</div><!--main-->
		</div><!--container-->
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

</body>

</html>
						</div>

