<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_POST['Libelle'])) {
	

$target = "img/".basename($_FILES['img']['name']);

$Libelle = $_POST['Libelle'];
$type=$_POST['type'];
$garantie=$_POST['garantie'];
$contact=$_POST['contact'];
$NomEnregistrement=$_POST['NomEnregistrement'];
$agent=$_POST['agent'];
$ref = $_POST['ref'];
$serie=$_POST['serie'];
$dateFin=$_POST['dateFin'];
$dateDebut=$_POST['dateDebut'];
$omg=$_FILES['img']['name'];
if (empty($Libelle) || empty($type) || empty($garantie) || empty($contact)  ||  empty($agent)  || empty($dateDebut) || empty($dateFin)) {
	header("Location: ajoutlicence.php?enregistre=empty");
	exit();
}

/*if (!preg_match("/^[a-zA-Z'-]*$/", $Libelle) || !preg_match("/^[a-zA-Z'-]*$/", $type )) {
		header("Location: ajoutlicence.php?enregistre=char");
		exit();
	
} 
if(!filter_var($garantie, FILTER_VALIDATE_garantie)) {
	
		header("Location: ajoutlicence.php?enregistre=mail");
		exit();
	}
*/
if (!preg_match('/^[0-9]/', $Libelle)) {
		header("Location: ajoutlicence.php?enregistre=pro");
		exit();
	}
if (!preg_match('/^[0-9]/', $type)) {
		header("Location: ajoutlicence.php?enregistre=typ");
		exit();
	}
if (!preg_match('/^[0-9]/', $garantie)) {
		header("Location: ajoutlicence.php?enregistre=gar");
		exit();
	}
if (!preg_match('/^[0-9]/', $agent)) {
		header("Location: ajoutlicence.php?enregistre=age");
		exit();
	}
if (!preg_match('/^[0-9]/', $contact)) {
		header("Location: ajoutlicence.php?enregistre=con");
		exit();
	}


if(isset($dateDebut) && isset($dateFin)) {
	if ($dateDebut > $dateFin ) {
		header("Location: ajoutlicence.php?enregistre=date");
		exit();
	}
}
if (!empty($Libelle) || !empty($type) || !empty($garantie) || !empty($contact) || !empty($NomEnregistrement) || !empty($agent)  || !empty($dateDebut) || !empty($dateFin)) 
 	
  {
if (move_uploaded_file($_FILES['img']['tmp_name'], $target )) {


$requete="insert into licence (IdProduit, IdTypeLicence,  Garantie, DateDebut, DateFin, NomEnregistrement, IdAgent, Numerodeserie, IdContactClient, ReferenceMarche, ImageLicence, Validation) values (" . $Libelle . "," . $type .",'" . $garantie . "' ,'" . $dateDebut . "','" . $dateFin . "' ,'" . $NomEnregistrement ."'," . $agent .",'" . $serie ."' , " . $contact .", '" . $ref . "', '" . $omg . "', 'Active')"; }
else {
	$requete="insert into licence (IdProduit, IdTypeLicence,  Garantie, DateDebut, DateFin, NomEnregistrement, IdAgent, Numerodeserie, IdContactClient, ReferenceMarche, ImageLicence, Validation) values (" . $Libelle . "," . $type .",'" . $garantie . "' ,'" . $dateDebut . "','" . $dateFin . "' ,'" . $NomEnregistrement ."'," . $agent .",'" . $serie ."' , " . $contact .", '" . $ref . "', '" . $omg . "', 'Active')";
}
var_dump($requete);
if ($pdo->exec($requete)) {
	$requete1 = "select * from produit where IdProduit = " . $Libelle . "";
	$resu = $pdo->query($requete1);
$affi = $resu->fetchAll(PDO::FETCH_OBJ);
foreach ($affi as $key ) 
header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] . "&pass=" . $_SESSION['PasswordAgent'] . "&enregistre=success&Libelle=" . $key->LibelleProduit . "");

}
}
}

?>
