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
		header("Location: modifieragent.php?enregistre=char");
		exit();
	
} 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
		header("Location: modifieragent.php?enregistre=mail");
		exit();
	}
 

if (!preg_match('/^[0-9]{10}$/', $tel)) {
		header("Location: modifieragent.php?enregistre=tel");
		exit();
	}

if ($pass != $Cpass) {
	header("Location: modifieragent.php?enregistre=pass");
		exit();
}


 
if (!empty($nom) || !empty($prenom) || !empty($email) || !empty($tel) || !empty($pass) || !empty($Cpass) || preg_match("/^[a-zA-Z'-]*$/", $nom) || preg_match("/^[a-zA-Z'-]*$/", $prenom) || ilter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/^[0-9]{10}$/', $tel) || $pass == $Cpass) 
 	
  {

$requete="UPDATE agent SET  NomAgent = '" . $nom . "',  PrenomAgent = '" . $prenom . "', TelAgent = '" . $tel . "' , PasswordAgent = '" . $pass . "' WHERE IdAgent = " . $_SESSION['IdAgent'] . "";

if ($pdo->exec($requete)) {
$_SESSION['PasswordAgent'] = $Cpass;

$_SESSION['NomAgent'] = $nom;
$_SESSION['PrenomAgent'] = $prenom;
$_SESSION['TelAgent'] = $tel;

header("Location: modifieragent.php?enregistre=success");
}
}
}
?>