<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

$requete = "DELETE FROM typelicence
 where IdTypeLicence = " . $_GET['id'] . "";
			
			
if($pdo->exec($requete)) {
	header("Location: tabletypelicence?suppression=valid");
}
else {
	header("Location: tabletypelicence?suppression=echec");

}
?>