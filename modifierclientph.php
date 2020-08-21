<?php

$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['nomclient'])) {
	

$nomclient = $_GET['nomclient'];
$adresse=$_GET['adresse'];
$email=$_GET['email'];
$tel=$_GET['tel'];


if (empty($nomclient) || empty($adresse)) {
	header("Location: modifierclient.php?enregistre=empty");
	exit();
}





 
if (!empty($nomclient) || !empty($adresse) ) 
 	
  {

$requete="UPDATE client SET  NomClient = '" . $nomclient . "',  AdresseClient = '" . $adresse . "', EmailClient = '" . $email . "' , TelClient = '" . $tel . "', SiteClient = '" . $site . "' WHERE IdClient = " . $_GET['id']. "";

if ($pdo->exec($requete)) {
header("Location: tableclient.php?enregi=success");
}
}
}
?>
