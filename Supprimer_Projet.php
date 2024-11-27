<?php
include('connexion.php');

$ProjetId=$_GET['ProjetId'];
$n=$connexion->exec("DELETE FROM Projet where ProjetId='$ProjetId'");
if($n){
    echo "suppression affectue avec succés";
    header("location:index2.php");
}
else{
    echo"suppression echouée";
}


?>