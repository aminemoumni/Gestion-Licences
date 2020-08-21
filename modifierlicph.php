<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['Libelle'])) {


$Libelle = $_GET['Libelle'];
$type=$_GET['type'];
$garantie=$_GET['garantie'];
$contact=$_GET['contact'];
$NomEnregistrement=$_GET['NomEnregistrement'];
$agent=$_GET['agent'];
$serie=$_GET['serie'];
$dateFin=$_GET['dateFin'];
$dateDebut=$_GET['dateDebut'];
$ref=$_GET['ref'];

if (empty($Libelle) || empty($type) || empty($garantie) || empty($contact)   || empty($agent)  || empty($dateDebut) || empty($dateFin)) {
	header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=empty");
	exit();
}

/*if (!preg_match("/^[a-zA-Z'-]*$/", $Libelle) || !preg_match("/^[a-zA-Z'-]*$/", $type )) {
		header("Location: modifierlic.php?enregistre=char");
		exit();
	
} 
if(!filter_var($garantie, FILTER_VALIDATE_garantie)) {
	
		header("Location: modifierlic.php?enregistre=mail");
		exit();
	}
*/
if (!preg_match('/^[0-9]/', $Libelle)) {
		header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=pro");
		exit();
	}

if (!preg_match('/^[0-9]/', $agent)) {
		header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=age");
		exit();
	}
if (!preg_match('/^[0-9]/', $type)) {
		header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=typ");
		exit();
	}
if (!preg_match('/^[0-9]/', $contact)) {
		header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=con");
		exit();
	}


if(isset($dateDebut) && isset($dateFin)) {
	if ($dateDebut > $dateFin ) {
		header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=date");
		exit();
	}
}
if (!empty($Libelle) || !empty($type) || !empty($garantie) || !empty($contact)  || !empty($agent) || !empty($dateDebut) || !empty($dateFin)) 
 	
  {
if (date('Y-m-d', strtotime( date('Y-m-d'))) < $dateFin) {
$requete="UPDATE licence SET IdProduit = " . $Libelle . ", IdTypeLicence = " . $type . ",  Garantie = '" . $garantie . "', DateDebut = '" . $dateDebut . "' , DateFin = '" . $dateFin . "', NomEnregistrement ='" . $NomEnregistrement . "', IdAgent = " . $agent . ", Numerodeserie ='" . $serie . "', IdContactClient = " . $contact . ", ReferenceMarche='" . $ref . "', Validation = 'Active' WHERE IdLicence = " . $_GET['id'] . "";
var_dump($requete);
}
if (date('Y-m-d', strtotime( date('Y-m-d'))) >= $dateFin) {
$requete="UPDATE licence SET IdProduit = " . $Libelle . ", IdTypeLicence = " . $type . ",  Garantie = '" . $garantie . "', DateDebut = '" . $dateDebut . "' , DateFin = '" . $dateFin . "', NomEnregistrement ='" . $NomEnregistrement . "', IdAgent = " . $agent . ", Numerodeserie ='" . $serie . "', IdContactClient = " . $contact . ", ReferenceMarche='" . $ref . "', Validation = 'Expire' WHERE IdLicence = " . $_GET['id'] . "";
var_dump($requete);
}
if ($pdo->exec($requete)) {
header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] . "&pass=" . $_SESSION['PasswordAgent'] . "&enregistre=success&Libelle=" . $key->LibelleProduit . "");
}
else {
	header("Location: modifierlic.php?id=" . $_GET['id'] . "&enregistre=change");
}
}
}
?>