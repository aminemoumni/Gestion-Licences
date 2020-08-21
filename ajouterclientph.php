<?php

$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['nomclient'])) {
	

$nomclient = $_GET['nomclient'];
$adresse=$_GET['adresse'];
$email=$_GET['email'];
$tel=$_GET['tel'];
$site=$_GET['site'];

if (empty($nomclient) || empty($adresse) ) {
	header("Location: ajoutclient.php?enregistre=empty");
	exit();
}





 
if (!empty($nomclient) || !empty($adresse)) 
 	
  {

$requete="insert into client (EmailClient, SiteClient,  NomClient, AdresseClient, TelClient) values ('','" . $site ."','" . $nomclient . "','" . $adresse . "','" . $tel . "')";

if ($pdo->exec($requete)) {
header("Location: tableclient.php?enregistre=succes&nomclient=" . $nomclient . "");
}
}
}
?>
