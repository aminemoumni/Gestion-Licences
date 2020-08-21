<?php

$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$reqe = "select EmailAgent from agent";
$resu = $pdo->query($reqe);
$affi = $resu->fetchAll(PDO::FETCH_OBJ);
if (isset($_GET['nom'])) {
	

$nom = $_GET['nom'];
$prenom=$_GET['prenom'];
$email=$_GET['email'];
$tel=$_GET['tel'];
$pass=$_GET['pass'];
$Cpass=$_GET['Cpass'];
if (empty($nom) || empty($prenom) || empty($email) || empty($tel) || empty($pass) || empty($Cpass)) {
	header("Location: ajoutagent.php?enregistre=empty");
	exit();
}

if (!preg_match("/^[a-zA-Z'-]*$/", $nom) || !preg_match("/^[a-zA-Z'-]*$/", $prenom )) {
		header("Location: ajoutagent.php?enregistre=char");
		exit();
	
} 
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
		header("Location: ajoutagent.php?enregistre=mail");
		exit();
	}
 

if (!preg_match('/^[0-9]{10}$/', $tel)) {
		header("Location: ajoutagent.php?enregistre=tel");
		exit();
	}

if ($pass != $Cpass) {
	header("Location: ajoutagent.php?enregistre=pass");
		exit();
}
foreach ($affi as $key) {
	if ($email == $key->EmailAgent) {
		header("Location: ajoutagent.php?enregistre=same");
		exit();
	}
}
 
if (!empty($nom) || !empty($prenom) || !empty($email) || !empty($tel) || !empty($pass) || !empty($Cpass) || preg_match("/^[a-zA-Z'-]*$/", $nom) || preg_match("/^[a-zA-Z'-]*$/", $prenom) || ilter_var($email, FILTER_VALIDATE_EMAIL) || preg_match('/^[0-9]{10}$/', $tel) || $pass == $Cpass) 
 	
  {

$requete="insert into agent (EmailAgent, PasswordAgent,  NomAgent, PrenomAgent, TelAgent, Admin) values ('" . $email . "','" . $pass ."','" . $nom . "','" . $prenom . "','" . $tel . "','')";

if ($pdo->exec($requete)) {
header("Location: tableagent.php?enregi=succes");
}
}
}
?>
