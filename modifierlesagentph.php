<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

if (isset($_GET['nom'])) {
	

$nom = $_GET['nom'];
$prenom=$_GET['prenom'];
$email=$_GET['email'];
$tel=$_GET['tel'];
$pass=$_GET['pass'];
$Cpass=$_GET['Cpass'];
if (empty($nom) || empty($prenom) || empty($email) || empty($tel) || empty($pass) || empty($Cpass)) {
	header("Location: modifieragent.php?enregistre=empty");
	exit();
}

if (!preg_match("/^[a-zA-Z'-]*$/", $nom) || !preg_match("/^[a-zA-Z'-]*$/", $prenom )) {
		header("Location: modifierlesagent.php?enregistre=char");
		exit();
	
} 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
		header("Location: modifierlesagent.php?enregistre=mail");
		exit();
	}
 

if (!preg_match('/^[0-9]{10}$/', $tel)) {
		header("Location: modifierlesagent.php?enregistre=tel");
		exit();
	}

if ($pass != $Cpass) {
	header("Location: modifierlesagent.php?enregistre=pass");
		exit();
}


 
if (!empty($nom) || !empty($prenom) || !empty($email) || !empty($tel) || !empty($pass) || !empty($Cpass) || preg_match("/^[a-zA-Z'-]*$/", $nom) || preg_match("/^[a-zA-Z'-]*$/", $prenom) || ilter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/^[0-9]{10}$/', $tel) || $pass == $Cpass) 
 	
  {
	$password = base64_encode($pass);
$requete="UPDATE agent SET  NomAgent = '" . $nom . "',  PrenomAgent = '" . $prenom . "', TelAgent = '" . $tel . "' , PasswordAgent = '" . $password . "' WHERE IdAgent = " . $_GET['id'] . "";

if ($pdo->exec($requete)) {

header("Location: tableagent.php?enregistre=success");
}
}
}
?>