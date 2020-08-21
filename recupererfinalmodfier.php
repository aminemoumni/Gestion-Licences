<?php
session_start(); 
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$pass=$_GET['pass'];
$cpass=$_GET['cpass'];

if ($pass != $cpass) {
		
header("location: recuperermodifier.php?Erreur=pasdeemail");
exit();
}
if ($pass == $cpass) {
	
		$requete="UPDATE agent SET  PasswordAgent = '" . $cpass . "' WHERE EmailAgent = '" . $_SESSION['email'] . "'";
		
	}
	
	/*header("location: loginfinal.php");*/



if ($pdo->exec($requete)) {
	header("location: loginfinal.php");
}
?>
