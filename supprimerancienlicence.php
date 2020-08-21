<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');
$requete = "select *
from licence";
$resultat = $pdo->query($requete);
$affiche = $resultat->fetchALL(PDO::FETCH_OBJ);
foreach ($affiche as $dataa) {
	$recup = $dataa->DateFin;
if ($recup < date('Y-m-d', strtotime( date('Y-m-d')))) {
	
	$requete1 = "UPDATE Licence SET Validation = 'Expire'
 where DateFin = '" . $recup . "'";


}}
if ($pdo->exec($requete1)) {
header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] ."&pass=" . $_SESSION['PasswordAgent'] . "&sup=supprimer");
} else {
	header("Location: acceuil.php?email=" . $_SESSION['EmailAgent'] ."&pass=" . $_SESSION['PasswordAgent'] . "&sup=clean");
}
  ?>
