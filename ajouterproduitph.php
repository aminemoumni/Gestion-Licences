<?php

$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['DesignationProduit'])) {
	


$DesignationProduit=$_GET['DesignationProduit'];

if (empty($DesignationProduit)) {
	header("Location: ajoutproduit.php?enregistre=empty");
	exit();
}

/*if (!preg_match("/^[a-zA-Z'-]*$/", $LibelleProduit)) {
		header("Location: ajoutproduit.php?enregistre=char");
		exit();
	
} 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
		header("Location: ajoutproduit.php?enregistre=mail");
		exit();
	}
 

if (!preg_match('/^[0-9]{10}$/', $tel)) {
		header("Location: ajoutproduit.php?enregistre=tel");
		exit();
	}
*/


 
if (!empty($DesignationProduit)) 
 	
  {

$requete="insert into produit (LibelleProduit, DesignationProduit) values ('','" . $DesignationProduit . "')";

if ($pdo->exec($requete)) {
header("Location: tableproduit.php?enregistre=success");
}
}
}
?>
