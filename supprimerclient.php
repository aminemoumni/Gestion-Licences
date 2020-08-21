<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

$requete = "DELETE FROM client
 where IdClient = " . $_GET['id'] . "";
			
			
if($pdo->exec($requete)) {
	header("Location: tableclient?suppression=valid");
}
else {
	header("Location: tableclient?suppression=echec");

}
?>