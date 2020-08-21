<?php
$pdo = NEW PDO('mysql:host=localhost;dbname=Gestionlicence','root');


if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
   
    $requete3 = "SELECT * FROM contactclient WHERE IdClient = ".$_POST['country_id']."";
    $resultat3 = $pdo->query($requete3);
    $client = $resultat3->fetchAll(PDO::FETCH_OBJ);
    //Count total number of rows
   
    
    //Display states list
    if(!empty($client)){
        echo '<option>Select Contact Client</option>';
        foreach ($client as $key ) {
            
         
            echo '<option value="'.$key->IdContactClient.'">'.$key->NomContactClient.'</option>';
        }
    }else{
        echo '<option>Contact client no disponible</option>';
    }
}