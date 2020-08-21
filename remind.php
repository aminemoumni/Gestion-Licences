<?php 
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');


$req = "select *
from licence NATURAL JOIN produit ";
$resu = $pdo->query($req);
$affi = $resu->fetchAll(PDO::FETCH_OBJ);

foreach ($affi as $dat)

if (date('Y-m-d', strtotime( date('Y-m-d') . ' + 14 days'  )) == $dat->DateFin  ) 
{
	

	$headers = 'From: ihmtechnooo@gmail.com' . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=utf-8';
	$result = mail("ihmtechnooo@gmail.com", "Alert Licence", "Votre Licence " . ucwords($dat->LibelleProduit) . " De L'entreprise " . ucwords($dat->DesignationProduit) . " Va Expire Dans 14 Jours. <br> LA DATE DE EXPIRATION: " . $dat->DateFin . "", $headers);
	


}
if (date('Y-m-d', strtotime( date('Y-m-d'))) == $dat->DateFin  ) {
	

	$headers = 'From: ihmtechnooo@gmail.com' . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=utf-8';
	$result = mail("ihmtechnooo@gmail.com", "Alert Licence", "Votre Licence " . ucwords($dat->LibelleProduit) . " De L'entreprise " . ucwords($dat->DesignationProduit) . " ESt Expire ! <br> LA DATE DE EXPIRATION: " . $dat->DateFin . "", $headers);
	var_dump($result);
}
if (date('Y-m-d', strtotime( date('Y-m-d') . ' + 14 days'  )) == $dat->DateFin or date('Y-m-d', strtotime( date('Y-m-d'))) == $dat->DateFin   ) {
	header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] ."&pass=" . $_SESSION['PasswordAgent'] . "&Erreur=correcte"); }
else {
header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] ."&pass=" . $_SESSION['PasswordAgent'] . "&Erreur=pasdedate"); }

?>