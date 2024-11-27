<?php
session_start();      
include("connexion.php");
$ClientId=1;
              $maxClientId = $connexion->query("SELECT MAX(ClientId) AS maxClientId FROM Client");
            $maxClientIdResult = $maxClientId->fetch(PDO::FETCH_ASSOC);
            $ClientId = $maxClientIdResult['maxClientId'] + 1;
            
if (isset($_POST['valider'])){
  $errors=[];
  if(!array_key_exists('Nom' , $_POST) || $_POST['Nom'] ==''){
    $errors['Nom'] = "You have not entered your LAST NAME" ;
  }
  if(!array_key_exists('Prenom' , $_POST) || $_POST['Prenom'] ==''){
    $errors['Prenom'] = "You have not entered your FIRST NAME" ;
  }
  if(!array_key_exists('RaisonSociale' , $_POST) || $_POST['RaisonSociale'] ==''){
    $errors['RaisonSociale'] = "You have not entered your SOCIAL REASON " ;
  }
  if(!array_key_exists('Telephone' , $_POST) || $_POST['Telephone'] ==''){
    $errors['Telephone'] = "You have not entered your PHONE " ;                 }
    elseif (!preg_match('/^\+?\d+$/', $_POST['Telephone'])) {
      $errors['Telephone'] = "Invalid phone number format. Please enter only digits, optionally starting with '+'";
  }
  
    if(!array_key_exists('Adresse' , $_POST) || $_POST['Adresse'] ==''){
    $errors['Adresse'] = "You have not entered your ADRESS ";
  }
  else{};
  if(!empty($errors)){
    $_SESSION['errors'] =$errors ;
    header("Location:Ajout_Client.php");
    exit;
  }
  else{

    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];  
    $RaisonSociale=$_POST['RaisonSociale'];
    $Telephone=$_POST['Telephone'];
    $Adresse=$_POST['Adresse'];
    $ClientTypeId=$_POST['ClientTypeId'];
 
    $nb=$connexion->exec("INSERT INTO client values('$ClientId','$Nom','$Prenom','$RaisonSociale' ,'$Telephone' ,'$Adresse' , '$ClientTypeId')");
    foreach ($_POST['ProjetId'] as $projetId) {

      $connexion->exec("INSERT INTO ClientProjet  VALUES ('$ClientId', '$projetId')"); } 
    if($nb!=0){
      echo "ajout validee <br> ";
      header("Location:Clients.php");
    }
    else
    { echo "ajout non validee"; }
}

}
echo " <a href='accueil_administrateur.php' style='color:black ; margin-top:40px ; padding:29px ; font-size:29px ;'> <i class='fa-solid fa-arrow-left'></i></a>
<div style='display:flex ; float:right'>
<a href=Clients.php style='color:black ; padding-right :20px ; text-decoration:none ; font-weight:500 ; font-size: 20px ; margin-top:49px'>Clients list</a>
      <a href=Login.php style='font-size: 20px ; margin-top:40px ;  margin-right:40px' class='btn btn-warning ml-md-3'>Log Out</a>
</div>" ;
?>

<head>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color:#E0E0E0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

     
          
<?php

    echo"
    <div class='container d-flex justify-content-center'> 
    <div class='row align-items-center'>
    <div class='col-10 col-md-8 m-auto ml-lg-auto mr-lg-0 col-lg-6 pt-5 pt-lg-0'>
    <img src='add_Client.png' width='740px' style='margin-top:1px'>
    </div>
   
    <div class='col-11 col-md-8 m-auto ml-lg-auto mr-lg-0 col-lg-6 pt-5 pt-lg-0'>
    <div style='width:550px ; height: 1000px ;background-color:#f6f6f9;  float:right ; margin-top:60px'>
<form action='' method='POST' style='margin-left:40px ; margin-right:40px  ; color:#333333'>

            <br><h1 style='text-align:center'>Add Client</h1><br> " ; 
            if(array_key_exists('errors' , $_SESSION)): 
              echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'> "
               . implode('<br>',$_SESSION['errors']) . 
             " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div> <br>";
            endif;
             unset($_SESSION['errors']);
            echo"<div class='row'>
            <div class='col'><label>Last Name</label> <input type='text' name='Nom'  class='form-control' ></div>
            <div class='col'><label>First Name</label> <input type='text' name='Prenom'  class='form-control' > </div>
            </div><br>
            <label>Social reason</label> <input type='text' name='RaisonSociale'  class='form-control' ><br>
            <label>Phone Number </label>
            <div class='row'>
            <div class='col-md-1'>
            <select class='form-select' id='countryCode' name='CountryCode'>
    <option value='+216'>Tunisia (+216)</option>
    <option value='+90'>Turkey (+90)</option>
    <option value='+41'>Switzerland (+41)</option>
    <option value='+351'>Portugal (+351)</option>
    <option value='+39'>Italy(+39)</option>
    <option value='+7'>Russia (+7)</option>
    <option value='+1'>Canada (+1)</option>
    <option value='+33'>France (+33)</option>
    <option value='+212'> Morocco (+212)</option>
</select>
</div>
<div class='col-md-10'>
 <input type='tel' id='phoneNumber' name='Telephone'  class='form-control' >
 </div>
 </div>
 <br>
             Adresse<input type='text' name='Adresse'  class='form-control' ><br>
             <label for='ProjetId'>Projets</label> <select name='ProjetId[]' class='form-select' multiple id='selectProjets'> " ;
                
          include("connexion.php");
            $r = $connexion->query("SELECT ProjetId , Titre FROM Projet");
    
            while ($m = $r->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $m['ProjetId'] . "'>" . $m['Titre'] . "</option> ";
    
            }?>
            </select> 
            <br>
            Type Client <select name='ClientTypeId' class='form-select' >
              <?php
              include("connexion.php");
           $result = $connexion->query("SELECT ClientTypeId , Libelle FROM clienttype");

            while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $d['ClientTypeId'] . "'>" . $d['Libelle'] .  "</option>";
            }
                echo "</select> <br> <br> <a href='accueil_administrateur.php' type='submit' name='valider' class='btn btn-danger' style='float:right ; margin-left:10px'> Cancel </a> <button type='submit' name='valider' class='btn btn-dark' style='float:right'><i class='fas fa-plus ms-2'></i> Add</button>
                <br>

                </form>
        </div>
        </div>
        </div>
        </div> "; ?>
<script>
    $('#countryCode').on('change', function () {
        var selectedCountryCode = $(this).val();
        
        $('#phoneNumber').val(selectedCountryCode);
    });
</script>
        <script>
    $(document).ready(function () {
        // Activer/désactiver la sélection au clic pour la liste des projets
        $("#selectProjets").mousedown(function (e) {
            e.preventDefault();
            
            // Récupérer l'option sur laquelle l'utilisateur a cliqué
            var original = e.target;
            
            // Basculer l'attribut "selected" de l'option
            if (original.tagName === "OPTION") {
                original.selected = !original.selected;
            }
        });
    });
</script>
</body>
