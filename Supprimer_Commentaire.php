<?php
include('connexion.php');
$CommentaireId=$_GET['CommentaireId'];
$n=$connexion->exec("DELETE From Commentaire where CommentaireId='$CommentaireId' ");
if($n){
    echo "suppression affectue avec succés";
    header("location:Commentaires.php");
}
else{
    echo"suppression echouée";
}