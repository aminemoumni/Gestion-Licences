<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

$requete = "DELETE FROM produit
 where IdProduit = " . $_GET['id'] . "";
			
			
if($pdo->exec($requete)) {
	header("Location: tableproduit.php?suppression=valid");
}
else {
	header("Location: tableproduit.php?suppression=echec");

}
?>