<?php
include('connexion.php');

$ContactId=$_GET['ContactId'];
$n=$connexion->exec("DELETE FROM Contact where ContactId='$ContactId'");
if($n){
    echo "suppression affectue avec succés";        
    header("location:requests.php ");

}
else{
    echo"suppression echouée";
}


?>