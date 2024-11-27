<?php
include('connexion.php');

$ContactId=$_GET['ContactId'];
$aff = $connexion->query("SELECT  ProjetId FROM Contact where ContactId='$ContactId' ");
while ($m = $aff->fetch(PDO::FETCH_ASSOC)) {
    $ProjetId=$m['ProjetId'] ;
}
$n=$connexion->exec("DELETE FROM Contact where ContactId='$ContactId'");

if($n){
  
        
    header("location:Liste_Contacts.php?ProjetId=" . $ProjetId . "");

}
else{
    echo"suppression echouée";
}


?>