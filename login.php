<?php
session_start();

$pdo = NEW PDO('mysql:host=localhost;dbname=Gestionlicence','root');
if (isset($_GET['email']) && isset($_GET['pass']) && !empty($_GET['email']) && !empty($_GET['pass'])) {
	$requete = "select EmailAgent, PasswordAgent, IdAgent, NomAgent, PrenomAgent, TelAgent, Admin
	from agent where EmailAgent = :email ";
	$stmt = $pdo->prepare($requete);
	$stmt->bindParam(':email' ,$_GET['email'],PDO::PARAM_STR);

	$stmt->execute();
	$resu = $stmt->fetchObject();

		if( isset($resu->EmailAgent)) { 
			$requete1 = "select EmailAgent, PasswordAgent, IdAgent, NomAgent, PrenomAgent, TelAgent, Admin
			from agent where EmailAgent = '" . $resu->EmailAgent . "' AND PasswordAgent = :pass ";
			
			$stmt2 = $pdo->prepare($requete1);
			$stmt2->bindParam(':pass' ,base64_encode($_GET['pass']),PDO::PARAM_STR);

			$stmt2->execute();
			$resu1 = $stmt2->fetchObject();
				if( isset($resu1->PasswordAgent)) {
					$_SESSION['time'] = date('H:i', strtotime( date('H:i')));
					$_SESSION['date'] = date('Y-m-d');
					$_SESSION['PasswordAgent'] = $resu->PasswordAgent; 
					$_SESSION['EmailAgent'] = $resu->EmailAgent;
					$_SESSION['IdAgent'] = $resu->IdAgent;
					$_SESSION['NomAgent'] = $resu->NomAgent;
					$_SESSION['PrenomAgent'] = $resu->PrenomAgent;
					$_SESSION['TelAgent'] = $resu->TelAgent;
					$_SESSION['Admin'] = $resu->Admin;

					header("Location: acceuil.php");
					}
				else 
				{
					header("Location: index.php?erreur=pass&email=" . $_GET['email'] );
				}

		}
		else
		{
			header("Location: index.php?erreur=email");
		}


	}
else 
	{
	  header("Location: index.php?erreur=vide");
	}



?>