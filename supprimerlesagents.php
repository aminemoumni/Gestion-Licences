<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

$requete = "DELETE FROM agent
 where IdAgent = " . $_GET['id'] . "";
			
			
if($pdo->exec($requete)) {
	header("Location: tableagent?suppression=valid");
}
else {
	header("Location: tableagent?suppression=echec");

}
?>