<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['nomontactclient'])) {
	

$nomontactclient = $_GET['nomontactclient'];

$email=$_GET['email'];
$tel=$_GET['tel'];
$client=$_GET['client'];

if (empty($nomontactclient)  || empty($client)) {
	header("Location: modifiercontactclient.php?enregistre=empty");
	exit();
}

if (!preg_match("/^[a-zA-Z'-]*$/", $nomontactclient)) {
		header("Location: modifiercontactclient.php?enregistre=char");
		exit();
	
} 

if (!preg_match('/^[0-9]/', $client)) {
		header("Location: modifiercontactclient.php?enregistre=typ");
		exit();
	}



 
if (!empty($nomontactclient)  || !empty($client)) 
 	
  {

$requete="UPDATE contactclient SET  NomContactClient = '" . $nomontactclient . "',  TelContactClient = '" . $tel . "', EmailContactClient = '" . $email . "' , IdClient = '" . $client . "' WHERE IdContactClient = " . $_SESSION['id']. "";

if ($pdo->exec($requete)) {
header("Location: tablecontactclient.php?enregistre=success&nomontactclient=" . $nomontactclient . "");
}
else {
	header("Location: modifiercontactclient.php?id=" . $_SESSION['id'] . "&enregistre=change");
}
}
}
?>