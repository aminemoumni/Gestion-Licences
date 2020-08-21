<?php
session_start(); 
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$email = $_GET['email'];
$req = "select *
from agent where EmailAgent like'" . $email ."'";
$resu = $pdo->query($req);
$affi = $resu->fetchAll(PDO::FETCH_OBJ);
$characts = 'abcdefghijklmnopqrstuvwxyz'; 
$characts .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';	
$characts .= '1234567890'; 
$code_aleatoire = ''; 

for($i=0;$i < 10;$i++) 
{ 
$code_aleatoire .= $characts[ rand() % strlen($characts) ]; 
} 
$_SESSION['email'] = $email;
$_SESSION['code'] = $code_aleatoire;
if (!empty($affi)) {
foreach ($affi as $key) {
	

	$headers = 'From: ihmtechnooo@gmail.com' . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=utf-8';
	$result = mail($key->EmailAgent, "Code De confirmation", "Votre De Confirmation: " .$_SESSION['code'] . "", $headers);
	
header("Location: recupererverif.php");

}
}
else {
	header("location: recuppasse.php?Erreur=pasdeemail");
}


?>