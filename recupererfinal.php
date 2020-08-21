<?php
session_start(); 


if ($_SESSION['code'] == $_GET['code'] ) {

header("Location: recuperermodifier.php");

}

else {
header("location: recupererverif.php?Erreur=pasdeemail");
}


?>