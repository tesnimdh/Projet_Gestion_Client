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
<body style="background-color: #E0E0E0;">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <header style="background-color: #E0E0E0; font-size: 20px;">
    <br><div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">
        <?php 
        include("connexion.php");
        $ProjetId=$_GET['ProjetId'];
        
      echo "<a href=' detaille_Projet.php?ProjetId= " . $ProjetId . "  ' style='color:black ; font-size:29px'> <i class='fa-solid fa-arrow-left'></i> </a>" ; 
?>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarNav5">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a href=index.php class="nav-link" style="color:black ;">List Projects</a>
            </li>
          
           
            <a href=Login.php style="font-size:20px ; margin-left:20px " class="btn btn-warning ml-md-3" >Log in</a>
          </ul>
  
          
        </div>
      </nav>
    </div>
  </header>

<?php
    echo"<div class='container d-flex justify-content-center'>";
    include("connexion.php");
    $ContactId=1;
    $ProjetId=$_GET['ProjetId'];
    $maxContactIdQuery = $connexion->query("SELECT MAX(ContactId) AS maxContactId FROM Contact");
    $maxContactIdResult = $maxContactIdQuery->fetch(PDO::FETCH_ASSOC);
    $ContactId = $maxContactIdResult['maxContactId'] + 1;   
echo "
<div style='width:650px ; background-color: white ; '>
<form  action=' ' method='POST' style='margin:50px ; margin-top:1px ; padding-top:-5px' >
            
              <img src='Contacts10.png' width=' 290px' style='padding-right:10px ; padding-top:5px' > <h1> Contact us </h1> <br> <br>";
              
              
              if(array_key_exists('errors' , $_SESSION)): 
                echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'> "
                 . implode('<br>',$_SESSION['errors']) . 
               " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div> <br>";
              endif;
               unset($_SESSION['errors']);
            echo "<div class='row'>
            <div class='col'><label class='form-label' for='nom'>Last Name </label> <input type='text' name='Nom' class='form-control' id='nom'></div> ";
         
            echo "<div class='col'><label for='prenom'>First Name</label> <input type='text' name='Prenom'  class='form-control' id='prenom'></div></div><br>
            <label for='telephone'>Telephone</label> <input type='tel' name='Telephone'  class='form-control' id='telephone'><br>
            <label for='email'>Email</label> <input type='mail' name='Email'  class='form-control' id='email'><br>

            <label >Objet</label> ";
            $ProjetId=$_GET['ProjetId'];
            $m=$connexion->query("SELECT ProjetId , Titre FROM projet where ProjetId='$ProjetId'");
            while($i = $m->fetch(PDO::FETCH_ASSOC)) {
                echo "<input class='form-control' type='text'  value='$i[Titre]' name='Objet' readonly/>";}
            echo "<br><label for='message' >Message</label> <textarea type='text' name='Message'  class='form-control' id='message'></textarea><br>";
            echo "<div style='display:flex'><button type='submit'  name='valider' class='btn btn-dark'> <i class='fa-regular fa-paper-plane'></i>  Envoyer </button>
            <br><a href='Detaille_Projet.php?ProjetId=" . $ProjetId . " ' type='submit'  name='Annuler' class='btn btn-danger' style='margin-left:10px'> Cancel </a></div>
                <br> <br> </form> 
                </div> ";
                include("connexion.php");
                if (isset($_POST['valider'])){
               
                  $errors=[];
            
                  if(!array_key_exists('Nom' , $_POST) || $_POST['Nom'] ==''){
                    $errors['name'] = "You have not entered your Last Name" ;
                  }
                  if(!array_key_exists('Prenom' , $_POST) || $_POST['Prenom'] ==''){
                    $errors['Prenom'] = "You have not entered your First Name" ;
                  }
                  if(!array_key_exists('Telephone' , $_POST) || $_POST['Telephone'] ==''){
                    $errors['Telephone'] = "You have not entered your Phone " ;
                  }
                  elseif (!preg_match('/^\+?\d+$/', $_POST['Telephone'])) {
                    $errors['Telephone'] = "Invalid phone number format. Please enter only digits, optionally starting with '+'";
                }
                
                  if(!array_key_exists('Email' , $_POST) || $_POST['Email'] ==''){
                    $errors['Email'] = "You have not entered your Mail " ;                 }
                    elseif (!filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
                      $errors['Email'] = " Email address is invalid ";
                  }
                    if(!array_key_exists('Message' , $_POST) || $_POST['Message'] ==''){
                    $errors['Message'] = "You have not entered your Message ";
                  }
                  else{};
                  if(!empty($errors)){
                   
                    $_SESSION['errors'] =$errors ;
                    header("Location:Ajout_Contact.php?ProjetId=" . $ProjetId . "");
                  }
                  else{
                   
                    $Nom=$_POST['Nom'];
                    $Prenom=$_POST['Prenom'];  
                    $Telephone=$_POST['Telephone'];
                    $Email=$_POST['Email'];
                    $Message=$_POST['Message'];
                    $ProjetId=$_GET['ProjetId'];
                    
                    $nb=$connexion->exec("INSERT INTO Contact values('$ContactId' , '$Nom','$Prenom', '$Telephone' ,'$Email' , '$Message' , '$ProjetId' )");
                    if($nb!=0){
                      $message_confirmation = "Your information has been successfully saved.";
                        echo "ajout validee <br>";
                        echo '<script>alert("Thank you ' . $Nom . ' ' . $Prenom . ' , ' . $message_confirmation . '");
                        window.location.href = "index.php "</script>';
                     
                       
                    }
                    else
                    {echo "ajout non validee";}
                }}
                
                  
                ?>
</body>