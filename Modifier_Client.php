<?php
session_start();
echo"<header style='background-color: #E0E0E0; font-size: 20px;'>
<div class='container'>
  <nav class='navbar navbar-dark navbar-expand-lg'>
<a href='Clients.php' style='color:black ; font-size:29px ;'> <i class='fa-solid fa-arrow-left'></i> </a>
</nav>
</div>
</header>" ;
include("connexion.php");
$ClientId=$_GET['ClientId'];
if(isset($_POST['submit'])){
$errors=[];
    if(!array_key_exists('Nom' , $_POST) || $_POST['Nom'] ==''){
      $errors['name'] = "You have not entered the LAST NAME" ;
    }
    if(!array_key_exists('Prenom' , $_POST) || $_POST['Prenom'] ==''){
      $errors['Prenom'] = "You have not entered the FIRST NAME" ;
    }
    if(!array_key_exists('RaisonSociale' , $_POST) || $_POST['RaisonSociale'] ==''){
      $errors['RaisonSociale'] = "You have not entered the SOCIAL REASON " ;
    }
    if(!array_key_exists('Telephone' , $_POST) || $_POST['Telephone'] ==''){
      $errors['Telephone'] = "You have not entered the PHONE NUMBER " ;}
      elseif (!preg_match('/^\+?\d+$/', $_POST['Telephone'])) {
        $errors['Telephone'] = "Invalid phone number format. Please enter only digits, optionally starting with '+'";
    }
    
      if(!array_key_exists('Adresse' , $_POST) || $_POST['Adresse'] ==''){
      $errors['Adresse'] = "You have not entered The ADRESS ";
    }
    else{};
    if(!empty($errors)){
      $_SESSION['errors'] =$errors ;

    }
    else{
    $Nom=$_POST['Nom'];
    $Prenom=$_POST['Prenom'];
    $Telephone=$_POST['Telephone'];
    $Adresse=$_POST['Adresse'];
    $ClientTypeId=$_POST['ClientTypeId'];
    $n=$connexion->exec("UPDATE Client SET Nom = '$Nom', Prenom='$Prenom', Telephone='$Telephone' , Adresse='$Adresse' , ClientTypeId='$ClientTypeId' WHERE Client.ClientId = '$ClientId';");
    $s=$connexion->exec("DELETE FROM ClientProjet WHERE ClientId='$ClientId'");
    foreach ($_POST['ProjetId'] as $projetId) {
        $connexion->exec("INSERT INTO ClientProjet (ClientId, ProjetId) VALUES ('$ClientId', '$projetId')");
    }
    if($n!=0 || $s!=0){
        echo "modification valide" ;
        header('Location:Clients.php');
       
    }
    else
    {echo " modification non valide";}}}
?>

<head>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  
   
<style>
    .a1{color:black ;}
   .a2{color:red ; }
   </style>
</head>
<body style="background-color : #E0E0E0">

<br> <br>

    
<?php

    echo "
    <div class='container d-flex justify-content-center'>
    <div style='width:650px ; padding-right:50px ; background-color: white ; '>
    <form  action='' method='POST' style='margin:50px ; color:#333333 '>
    <img src='Modifier.png' style='padding-left:10px ; float:right' width='80px'>
    </br> </br> 
    <h1 >Edit </h1>   
    <br>";
    if(array_key_exists('errors' , $_SESSION)): 
        echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'> "
         . implode('<br>',$_SESSION['errors']) . 
       " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div> <br>";
      endif;
       unset($_SESSION['errors']);
       include("connexion.php");
       $ClientId=$_GET['ClientId'];
       $m=$connexion->query("SELECT * FROM Client where Client.ClientId='$ClientId'");
       while($i = $m->fetch(PDO::FETCH_ASSOC)) {
   echo "<label class='form-label'>Id </label> 
   <input class='form-control' type='int'  value='$i[ClientId]' name='ClientId' /></br>
   <div class='row' >
            <div class=' col '>
            <label class='form-label'>Last Name : </label> 
   <input class='form-control' type='text'  value='$i[Nom]' name='Nom' /></div>
   <div class=' col '>
   <label class='form-label'> First Name : </label>
   <input class='form-control' type='text'  value='$i[Prenom]' name='Prenom'/> </div></div>  <br>
   <label class='form-label'> Social Reason : </label>
   <input class='form-control' type='text' value='$i[RaisonSociale]' name='RaisonSociale'/> <br>
   <label class='form-label'> Phone Number : </label>
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
 <input type='text' id='phoneNumber' name='Telephone' value='$i[Telephone]' class='form-control' >
 </div>
 </div>
   <label class='form-label'> Adress : </label> 
   <input class='form-control' type='text'  value='$i[Adresse]' name='Adresse' /> <br> " ; } 
   echo "<label>Projets</label> 
   <select multiple name='ProjetId[]' class='form-select' id='selectProjets' >";
   $queryProjects = "SELECT ProjetId FROM ClientProjet WHERE ClientId = $ClientId";
   $resultProjects = $connexion->query($queryProjects);
   $clientProjects = $resultProjects->fetchAll(PDO::FETCH_COLUMN);
        $queryAllProjects = "SELECT ProjetId, Titre FROM Projet";
        $resultAllProjects = $connexion->query($queryAllProjects);

        while ($project = $resultAllProjects->fetch(PDO::FETCH_ASSOC)) {
            $selected = in_array($project['ProjetId'], $clientProjects) ? 'selected' : '';
            echo "<option value='{$project['ProjetId']}' $selected>{$project['Titre']}</option>";
        }

        echo "</select> <br>
        <label class='form-label'> Type Client : </label> <select name='ClientTypeId' class='form-select' >'";
 
   $result = $connexion->query("SELECT ClientTypeId , Libelle FROM clienttype");

   while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
       echo "<option value='" . $d['ClientTypeId'] . "'>" . $d['Libelle'] . "</option>"; 
    }
   echo "</select>"; 
   echo "</br> <div><button type='submit' name='submit' class='btn btn-dark' style='float: left'><i class='fa-solid fa-pencil'></i> Edit </button><a href='Clients.php' type='submit' name='valider' class='btn btn-danger' style=' margin-left:10px'> Cancel </a></div>
   
   </form>
   </div> 
   </div>" ; 
  
  
   


?>
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