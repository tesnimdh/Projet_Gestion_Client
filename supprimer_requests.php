<?php
include('connexion.php');

$ClientId=$_GET['ClientId'];
$n=$connexion->exec("DELETE FROM Client where ClientId='$ClientId'");
if($n){
    echo "suppression affectue avec succés";        
    header("location:requests.php ");

}
else{
    echo"suppression echouée";
}


?>