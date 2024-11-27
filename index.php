<?php
session_start();
include("connexion.php");

// Fonction pour obtenir l'adresse IP de l'utilisateur
function getIPAddress() {
    // Si l'adresse IP est définie par le serveur
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Enregistrement de la visite dans la base de données
$ipAddress = getIPAddress();
$query = "INSERT INTO Visiteur (ipAdress) VALUES (:ipAddress)";
$statement = $connexion->prepare($query);
$statement->bindParam(':ipAddress', $ipAddress);
$statement->execute();
?>
<head>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .a1{color:black ; text-decoration:none; font-weight:bold}
   
   </style>
</head>

<body style="background-color : #E0E0E0">
<header style="background-color: #E0E0E0; font-size: 20px;">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
          <img src="xtensus_logo.png" height="60" alt="image">
        </a>
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarNav5" >
          <ul class="navbar-nav mr-auto">
          
            <a href=Login.php style="font-size: 20px;" class="btn btn-warning ml-md-3">Log in</a>
          </ul>
  
          
        </div>
      </nav>
    </div>
  </header>
  <br><br>
<h1 style="text-align : center ; color:black; font-size:40px " ><em> List of projects  </em>      <img src="projet10.png" width="500px"></h1>

<div class="container">
	<div class="container">
        <form  class="row"  method='POST' style="padding-left:50 px">
            <div class="col-md-1 ">

            <select class="form-control"  name="All">
                <option selected value="">All</option>
</select>
                
            </div>
            <div class="col-md-6 ">
                <input type="text"  class="form-control" placeholder="Search for Projects" name="searchTitle" />
            </div>

            <div class="col-md-3 ">
            <button style="background-color: #F2A922; border-color: #F2A922;" type="submit" class="btn btn-primary btn-block" name='valider'>
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
        </div>
        </br></br>
        </form>
        <br>
 
    
   

        <?php
            if (isset($_POST['valider'])) {
                include("connexion.php");
                $counter = 0;
                $searchTitle = $_POST['searchTitle'];

                
                    $query = "SELECT Titre, logo , pDescription , ProjetId FROM Projet  WHERE Projet.Titre LIKE '%$searchTitle%' ";
              

                $result = $connexion->query($query);
                
                while ($m = $result->fetch(PDO::FETCH_ASSOC)) {
                  if ($counter % 3 == 0) {
                    echo "<div class='row row-cols-3'>";
                }
                  echo "
                    

                    <div class='col-md-4'>
                    <div class='card mb-3' style='max-width: 550px ; '>
                   
                  <div class='row g-0'  >
                    <div class='col-md-8' style='width:100% ; text-align:center'>
                      <div class='card-body' >
                      <br>
                        <h5 class='card-title'  style= '  color:#435d7d '>" . $m['Titre'] . "</h5>
                        <h6 style='text-align : center '>" . $m['pDescription'] . "</h6>
                        <br><div><a style='color:#435d7d ' href=Detaille_Projet.php?ProjetId=" . $m['ProjetId'] . " class='a1'><i class='fa-solid fa-circle-info'></i> more details </a>
                        <br> <br>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                " ;
                $counter++;

                if ($counter % 3 == 0) {
                    echo "</div>";
                }
                    
            } }
            else {
                
      include("connexion.php");
      $counter = 0;
                $aff = $connexion->query("SELECT Titre , logo , ProjetId , pDescription FROM Projet  ");
                while ($m = $aff->fetch(PDO::FETCH_ASSOC)) {
                  if ($counter % 3 == 0) {
                    echo "<div class='row row-cols-3'>";
                }
                  echo "
      
      <div class='col-md-4'>
      <div class='card mb-3' style='max-width: 540px;'>
    <div class='row g-0'>
   
      <div class='col-md-8' style='width:100% ; text-align:center''>
        <div class='card-body'>
        <br>
          <h5 class='card-title' style= ' color:#435d7d ' >" . $m['Titre'] . "</h5>
          <h6 style=' text-align : center '>" . $m['pDescription'] . "</h6>
          <br><div><a style='color:#435d7d ; ' href=Detaille_Projet.php?ProjetId=" . $m['ProjetId'] . " class='a1'><i class='fa-solid fa-circle-info'></i> more details</a>
                        <br><br></div></div>
       
      </div>
    </div>
  </div>
  </div>" ;
  $counter++;

  if ($counter % 3 == 0) {
      echo "</div>";
  }
               
            }}
            ?>

      </div>
      <div>
        
          <form class="box-form" action="" method="POST" style="width:400px ; text-align:center">
      <label> Any Comments</label>
          <div class="row">
            <input id="commentInput" class="form-control" type="text" name="comment">
            <button id="submitButton" type="submit" class="btn btn-secondary" name="submit" disabled> Send </button>
      
          </div>
</form>
<?php
include("connexion.php");

        if (isset($_POST['submit'])){
          $CommentaireId=1;
          $comment=$_POST['comment'];
          $maxCommentaireId = $connexion->query("SELECT MAX(CommentaireId) AS maxCommentaireId FROM Commentaire");
    $maxCommentaireIdResult = $maxCommentaireId->fetch(PDO::FETCH_ASSOC);
    $CommentaireId = $maxCommentaireIdResult['maxCommentaireId'] + 1; 
          $nb=$connexion->exec("INSERT INTO Commentaire values('$CommentaireId' , '$comment') ");
          if($nb!=0){
            $message_confirmation = " Your comment has been successfully saved.";
                        echo '<script>alert("Thank you , ' . $message_confirmation . '");
                       </script>';
                     
        }
        else
        {echo "ajout non validee";}
        }
          
          ?>
          </div>
      </div>
      <script>
        $(document).ready(function() {
            $('#commentInput').on('input', function() {
                var comment = $(this).val();
                if (comment.trim() === '') {
                    $('#submitButton').prop('disabled', true);
                } else {
                    $('#submitButton').prop('disabled', false);
                }
            });
        });
    </script>
      
 