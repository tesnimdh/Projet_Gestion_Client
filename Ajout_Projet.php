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
<body style="background-color:#E0E0E0">
<header style=" font-size: 20px;">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">

      <a href="accueil_administrateur.php" style='color:black ; font-size:29px'> <i class='fa-solid fa-arrow-left'></i> </a>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarNav5">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a href=index2.php class="nav-link" style="color:black ; padding-right : 20px ; "> Projects List </a>
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
<div class="container d-flex justify-content-center">

  <div class="col-md-7 ms-sm-auto col-lg-10 px-md-5">

   <img src="add_projet.png" width="600px" >
<div style=' background-color:white ; width:650px '>
<form action="" method="POST" style='margin:46px ; '>
            <br> <h1 style='text-align:center ; padding-top:29px ; color:#435d7d '>Add Project</h1> <br><br>
            <?php
            include("connexion.php");
            $ProjetId=1;
            $maxProjetIdQuery = $connexion->query("SELECT MAX(ProjetId) AS maxProjetId FROM Projet");
                $maxProjetIdResult = $maxProjetIdQuery->fetch(PDO::FETCH_ASSOC);
                $ProjetId = $maxProjetIdResult['maxProjetId'] + 1;  
            if(array_key_exists('errors' , $_SESSION)): 
                echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'> "
                 . implode('<br>',$_SESSION['errors']) . 
               " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div> <br>";
              endif;
               unset($_SESSION['errors']); ?>
            <label >Title</label> <input type="text" name="Titre" class="form-control"><br>
           
            <label >Duration</label> <input type="text" name="Duree" class="form-control"><br>
            <label >Starting date</label> <input type="Date" name="Date" class="form-control"><br>
            <label >Logo</label> <input type="text" name="logo" class="form-control"><br>
            <label > Brief Description</label> <input type="text" name="pDescription" class="form-control"><br>
            <label >Description</label> <input type="text" name="Description" class="form-control"><br>
            <br> <button type="submit"  name="valider" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Add</button>
            <a href="accueil_administrateur.php" type="submit" name="Annuler" class="btn btn-danger"> Cancel </a><br><br><br><br>
        </form>
    </div>
    </div>
    </div>
        <?php
        include("connexion.php");
        if (isset($_POST['valider'])){
            $errors=[];
            if(!array_key_exists('Titre' , $_POST) || $_POST['Titre'] ==''){
              $errors['Titre'] = "You have not entered the TITLE" ;
            }
           

            if(!array_key_exists('Duree' , $_POST) || $_POST['Duree'] ==''){
              $errors['Duree'] = "You have not entered the DURATION " ;
            }
            if(!array_key_exists('Date' , $_POST) || $_POST['Date'] ==''){
              $errors['Date'] = "You have not entered the START DATE " ;
            }

            else {
                $enteredDate = new DateTime($_POST['Date']);
                        $minDate = new DateTime('2024-03-01');
                if ($enteredDate < $minDate) {
                    $errors['Date'] = "The START DATE must be after 01/03/2024";
                }
            }
              if(!array_key_exists('pDescription' , $_POST) || $_POST['pDescription'] ==''){
              $errors['pDescription'] = "You have not entered your LITTLE DESCRIPTION ";
            }
            if(!array_key_exists('Description' , $_POST) || $_POST['Description'] ==''){
                $errors['Description'] = "You have not entered your DESCRIPTION ";
              }

            else{};
            if(!empty($errors)){
             
              $_SESSION['errors'] =$errors ;
              header("Location:Ajout_Projet.php");
            }
            else{
            $Titre=$_POST['Titre'];
            $Duree=$_POST['Duree'];
            $Date=$_POST['Date'];
            $logo=$_POST['logo'];
            $pDescription=$_POST['pDescription'];
            $Description=$_POST['Description'];
            $nb=$connexion->exec("INSERT INTO Projet values('$ProjetId' , '$Titre','$Duree','$Date' , '$logo' , '$pDescription' , '$Description' )");
            if($nb!=0){
                echo "ajout validee <br>";
                header("Location:index2.php") ; 
            }
            else
            echo "ajout non validee";
        }}
        ?>
        
    
</body>
</html>