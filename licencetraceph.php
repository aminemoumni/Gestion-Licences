<?php
session_start();
$pdo = NEW PDO('mysql:host=localhost;dbname=gestionlicence','root');

$requete4 = "select * from licence WHERE IdLicence =" . $_GET['id'] . "";
$resultat4 = $pdo->query($requete4);
$licence = $resultat4->fetchAll(PDO::FETCH_OBJ);
foreach ($licence as $key) {
  $id = $key->IdLicence;
  $idproduit = $key->IdProduit;
  $idtype = $key->IdTypeLicence;
  $garantie = $key->Garantie;
  $datedebut = $key->DateDebut;
  $datefin = $key->DateFin;
  $nom = $key->NomEnregistrement;
  $idagent = $key->IdAgent;
  $num = $key->Numerodeserie;
  $contact = $key->IdContactClient;
  $ref = $key->ReferenceMarche;
  $img = $key->ImageLicence;
  $valid = $key->Validation;
  $requete="insert into tracelicence (IdLicence, IdProduit, IdTypeLicence,  Garantie, DateDebut, DateFin, NomEnregistrement, IdAgent, Numerodeserie, IdContactClient, ReferenceMarche, ImageLicence, Validation, DateTrace) values (" . $id . ",". $idproduit . "," . $idtype .",'" . $garantie . "' ,'" . $datedebut . "','" . $datefin . "' ,'" . $nom ."'," . $idagent .",'" . $num ."' , " . $contact .", '" . $ref . "', '" . $img . "', '" . $valid . "', '". date('Y-m-d', strtotime( date('Y-m-d'))) ."')"; 
  


if ($pdo->exec($requete)) {
header("Location: licencetracemodifier.php?enregistre=success&id=" . $id . "");
}
  
}
?>