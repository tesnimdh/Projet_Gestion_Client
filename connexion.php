<?php 
include('dbconfig.php');
try
{
	$connexion = new PDO('mysql:host='.$hote.';dbname='.$nom_bd,$utilisateur, $mot_passe); 
	
}

catch(Exception $e) 
{ 
    echo 'Erreur : '.$e->getMessage().'<br />'; 
    echo 'N° : '.$e->getCode(); 
}

