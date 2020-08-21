<?php

$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['typelicence'])) {
	

$typelicence = $_GET['typelicence'];


if (empty($typelicence)) {
	header("Location: ajoutertypelicence.php?enregistre=empty");
	exit();
}

/*if (!preg_match("/^[a-zA-Z'-]*$/", $typelicence)) {
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


 
if (!empty($typelicence)) 
 	
  {

$requete="insert into typelicence (LibelleTypeLicence) values ('" . $typelicence . "')";

if ($pdo->exec($requete)) {
header("Location: tabletypelicence.php?enregi=succes");
}
}
}
?>
