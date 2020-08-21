<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$_GET['id'];
$requete = "DELETE from contactclient WHERE IdContactClient = " . $_GET['id'] .";";
			var_dump($requete);
			
if($pdo->exec($requete)) {
	header("Location: tablecontactclient.php?&suppression=valid");
}
else {
	header("Location: tablecontactclient.php?&suppression=echec");
}
?>