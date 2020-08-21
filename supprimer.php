<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$_GET['id'];
$requete = "UPDATE Licence SET Validation = 'Expire'
 where IdLicence = " . $_GET['id'] . "";
			
			
if($pdo->exec($requete)) {
	header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] ."&pass=" . $_SESSION['PasswordAgent'] . "&suppression=valid");
}
?>