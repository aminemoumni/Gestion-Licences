<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

$requete = "DELETE FROM agent
 where IdAgent = " . $_SESSION['IdAgent'] . "";
			
			
if($pdo->exec($requete)) {
	header("Location: index.php");
}
?>