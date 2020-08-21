<?php

$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['nomontactclient'])) {
	

$nomontactclient = $_GET['nomontactclient'];

$email=$_GET['email'];
$tel=$_GET['tel'];
$client=$_GET['client'];

if (empty($nomontactclient)  || empty($client)) {
	header("Location: ajoutcontactclient.php?enregistre=empty");
	exit();
}




 
if (!empty($nomontactclient)  || !empty($client)) 
 	
  {

$requete="insert into contactclient (NomContactClient, TelContactClient,  EmailContactClient, IdClient) values ('" . $nomontactclient . "','" . $tel ."','" . $email . "','" . $client . "')";

if ($pdo->exec($requete)) {
header("Location: tablecontactclient.php?enregi=succes");
}
}
}
?>