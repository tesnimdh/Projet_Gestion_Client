<?php
session_start();
?>
<head>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style=" background-color:#E0E0E0 ">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <header style="background-color: #E0E0E0; font-size: 20px;">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">
      <a href='accueil_administrateur.php  ' style='color:black ; font-size:29px'> <i class='fa-solid fa-arrow-left'></i> </a>
       
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarNav5" >
          <ul class="navbar-nav mr-auto">
          <li class="nav-item">
              <a href=Clients.php class="nav-link" style="color:black ; padding-right :20px ; "> Clients list</a>
            </li>
            <a href=Login.php style="font-size: 20px;" class="btn btn-warning ml-md-3">Log Out</a>
          </ul>
  
          
        </div>
        <a class="navbar-brand" href="accueil_administrateur.php">
          <img src="xtensus_logo.png" height="60" alt="image" style="padding-left:20px ">
        </a>
      </nav>
    </div>
  </header>
  
 
<?php



include("connexion.php");
$ClientTypeId=1;
$maxClientTypeIdQuery = $connexion->query("SELECT MAX(ClientTypeId) AS maxClientTypeId FROM ClientType");
    $maxClientTypeIdResult = $maxClientTypeIdQuery->fetch(PDO::FETCH_ASSOC);
    $ClientTypeId = $maxClientTypeIdResult['maxClientTypeId'] + 1;  
echo " 
<div class='container d-flex justify-content-center' style='padding-top:100px ;'>
<div class='row align-items-center'>
<div class='col-12 col-md-12 col-lg-6 col-xl-5' style='; padding-right:20px'>
<div style='width:650px ; height:450px ; float:left ; background-color: white ;' >
<form  action=' ' method='POST' style='margin:52px ; color:#333333'>
        <br><br> <h1>Add Client Type</h1><br> " ;
        if(array_key_exists('errors' , $_SESSION)): 
          echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'> "
           . implode('<br>',$_SESSION['errors']) . 
         " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div> <br>";
        endif;
         unset($_SESSION['errors']);
        echo "<label > Wording : </label> <input type='text' name='Libelle'  class='form-control' ><br>
      
    
        <button type='submit'  name='valider' class='btn btn-dark'><i class='fa-solid fa-plus'></i> Add</button><br>
            </form>
            </div>
            </div>
           
            <div class='col-11 col-md-8 m-auto ml-lg-auto mr-lg-0 col-lg-6 pt-5 pt-lg-0'>
            <img src='Type_Client.jpg' style='float:right ; style='padding-top:10px ; padding-right : 5px ;' width='590px' height='450px'>
            </div>
            </div>
            </div>
    ";
    include("connexion.php");
    if (isset($_POST['valider'])){

      $errors=[];
      if(!array_key_exists('Libelle' , $_POST) || $_POST['Libelle'] ==''){
        $errors['Libelle'] = "You have not entered the WORDING" ;
      }
      else{};
                  if(!empty($errors)){
                   
                    $_SESSION['errors'] =$errors ;
                    header("Location:Ajout_ClientType.php");
                  }
                  else{
        $Libelle=$_POST['Libelle'];
        $nb=$connexion->exec("INSERT INTO clienttype values('$ClientTypeId' , '$Libelle')");
        if($nb!=0){
            echo "ajout validee <br>";
            header("Location:accueil_administrateur.php");
        }
        else
        echo "ajout non validee";
    }
  }
    
      
    ?>
    </body>