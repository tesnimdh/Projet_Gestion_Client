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
    .a1{color:black ; font-size:25px }
    .a2{ text-decoration:none ; float:right}
    .overlay {
  padding: 10px;
  width: 100%;
  background: #E0E0E0 ;
  overflow: hidden;
  box-sizing: border-box;
}
 
   .font-robo {
    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
  }
  
 
  
 
  
 
  
 
  

  
  .wrapper--w680 {
    max-width: 680px;
  }
  
  

  
  
  */
  .title {
    margin-top: 20px;
    margin-bottom: 37px;
  }
  

  .card {
    overflow: hidden;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 5px;
    background: #fff;
  }
  

  
 
  
  
  
</style>
</head>
<body>
<header style="background-color: #E0E0E0; font-size: 20px;">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">
       
  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarNav5">
          <ul class="navbar-nav mr-auto">
          
          
          
           
            <a href=Login.php style="font-size: 20px;" class="btn btn-warning ml-md-3">Log in</a>
          </ul>

  
          
        </div>
        <a class="navbar-brand" href="index.php">
          <img src="xtensus_logo.png" height="60" alt="image" style="padding-left:20px ">
        </a>
      </nav>
    </div>
  </header>
    <div class="overlay">
      <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
         <div class=" m-5 page-wrapper p-t-p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-5" >
        <div class="card-body d-flex justify-content-center">
          
            <?php
            include("connexion.php");
            $ProjetId=$_GET['ProjetId'];
            $aff=$connexion->query("SELECT *  FROM Projet  WHERE ProjetId='$ProjetId' ");
            while($m = $aff->fetch(PDO::FETCH_ASSOC)) {
              echo "  <img width='290px' src='" .$m['logo']. "'>" ; 
            }
            ?>
            </div>
            <div class="card-body">
            <?php
    include("connexion.php");
    $ProjetId=$_GET['ProjetId'];
    $aff=$connexion->query("SELECT *  FROM Projet WHERE ProjetId='$ProjetId' ");
    while($m = $aff->fetch(PDO::FETCH_ASSOC)) {
     
     
               echo "<br><br> <h1 style='text-align: center; color: #F2A922 ' class='title'>" .$m['Titre']. "</h1>
               <br><h4 style='text-align: center ; color:#435d7d ' >" .$m['pDescription']. "</h4>
               <br><p style='text-align:left ; font-weight:400px ;'>" .$m['Description']. "</p>
               " ; 
                
              
               
               
            
              
                
                   
  
                
       echo "</br></br> <a class=' a2 btn btn-dark ' href=Ajout_Contact.php?ProjetId=" . $m['ProjetId'] . " > Contact us</a>
       <a href=index.php class='a1'> <i class='fa-solid fa-arrow-left'></i></a> </div></div></div></div>" ;}  
       ?>
       <br><br>
       
       
                    
                    
                </div>
                <br>
                    