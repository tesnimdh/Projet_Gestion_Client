<?php
session_start();
include("connexion.php");

if (isset($_POST['valider'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $connexion->prepare("SELECT * FROM administrateur WHERE username= ? AND password = ?");
    $stmt->execute([$username, $password]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        $_SESSION['username'] = $username;
       
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
        header("location:Login.php");
    }
}
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
    html{font-size:14px ;}
    body{
      width:100vh;
      height:100vh ;
      font-size:0.88rem ;
      font-family: sans-serif ;
      user-select:none;
      background-color:#f6f6f9 ;
      overflow-x:hidden ;
    }
    .container{
      display: grid ;
      width:auto ; 
     
      
      gap : 1.8rem ;
      grid-template-columns: 14rem auto 24rem ; 
    }
  
   
    li{
      list-style-type:none ;
    }
    
    aside{
      height: 100% ;
      background-color:white ;

     
    
    
    }
    aside .top{

      display:flex;
      align-items:center ;
      justify-content:space-between;
      margin: top 1.4rem;
    }
aside .logo img{
  width:4rem;
  height:4rem ; 
}
aside .close{
  display:none ;
}
aside .sidebar{

  display:flex ; 
  flex-direction:column ;
  height: 80vh ; 
  position: relative ; 
  top : 3rem ;
  }
aside .sidebar a {
  display:flex ; 
  color:#7d8da1 ; 
  margin-left: 2rem ;
  gap : 1rem ; 
  align-items:center ; 
  position: relative ;
  height:3.7rem ; 
  transition:all 300ms ease ; 
  text-decoration:none;

}
aside .sidebar li a {
  display:flex ; 
  color:#7d8da1 ; 
  margin-left: 2rem ;
  gap : 1rem ; 
  align-items:center ; 
  position: relative ;
  height:3.7rem ; 
  transition:all 300ms ease ; 
  text-decoration:none;

}
aside .sidebar a i {
  font-size:1.6rem ;
  transition:all 300ms ease ; 
}
  aside span{
    font-weight:500;
  }
  aside .sidebar div ul li a:active{
    background-color:rgba(132,139,200,0.18) ;
    
    margin-left:0;
  }
 a:active{
    background-color:rgba(132,139,200 , 0.18) ;
    
    margin-left: 0;
  }
 
  aside .sidebar a:active i{
    color: #7380ec ;
   
  }
  aside .sidebar a:hover{
    color:#7380ec ;
  }
  aside .sidebar a:hover i{
    margin-left:1rem ;
   
  }
  main{
    margin-top:1.4rem ; 
  }
  div ul a span {
    font-size:15px ;
  }
  


   </style>
</head>
<body>
  <div class='container '>
    <div class='row flex-nowrap'>
<aside class="col-auto col-xl-2 col-xl-11 px-sm-0 px-2">
  <div class='top'>

    <div class='logo'>
  <img class="ms-3" src="xtensus_logo.png" style='margin-top:20px' alt=""></a>
</div>

<div class='close' id='close-btn'>
<i class="fa-solid fa-xmark"></i>
</div>

</div>


<div class='sidebar'>
      <li class="nav-item">

        <a class=" btn-toggle rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Project-collapse" aria-expanded="false">
          <i class="fa fa-pen ms-1" style='color:#F2A922'></i>
          <span style='color:#F2A922 ; font-weight:bold ; font-size:15px'> Projects </span>
        </a>
        
        <div class="collapse" id="Project-collapse" >
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
            
              <a href="index2.php" >
                <i class="fa fa-list ms-2"></i>
                <span >Project list</span>
              </a>
         

          
            <a href="Ajout_Projet.php" ><i class="fa fa-plus ms-2"></i><span class="d-none d-sm-inline ms-1">Add Project</span></a>



          </ul>
        </div>
</li>
        
      <li class="nav-item">
        <a class=" btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#Clients-collapse" aria-expanded="false">
          <i class="fa fa-pen ms-1" style='color:#F2A922'></i>
          <span style='color:#F2A922 ; font-weight:bold ; font-size:15px'>Clients </span>
        </a>
    

        <div class="collapse" id="Clients-collapse" >
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
              <a href="Clients.php" >
              <i class="fa fa-list ms-2"></i>
                <span class="d-none d-sm-inline ms-1">Client list</span>
              </a>
              
         
            
        
              <a href="Ajout_Client.php" >
              <i class="fa fa-plus ms-2"></i>
                <span class="d-none d-sm-inline ms-1">Add Client</span>
              </a>
              
          
              <a href="Ajout_ClientType.php" >
              <i class="fa fa-plus ms-2"></i>
                <span class="d-none d-sm-inline ms-1">Add Client Type</span>
              </a>
              
           
   
    
    </ul>
</div>
</li>

    

       
              
              <a href="requests.php" >
              <i class="fa-regular fa-address-book"></i>
                <span class="d-none d-sm-inline ms-1" style=" font-size:15px ; font-weight:500px ; ">Contacts</span>
                <span class=""><span class="badge badge-danger btn btn-danger" style='color:white'><?php

                include("connexion.php");
                  $resultat = $connexion->query("SELECT COUNT(*) AS nbContact FROM contact");

                  if ($resultat) {
                      $row = $resultat->fetch(PDO::FETCH_ASSOC);
      echo  "". $row["nbContact"] ;
      
                  } else {
                      echo "Erreur : " . $connexion->error;
                  }

                ?></span></span>
              </a>
              
        <a href="commentaires.php">
        <i class="fa-regular fa-comment"></i>
          <span class="d-none d-sm-inline ms-1" style="font-size:15px ; font-weight:500px ;">Comments</span>
          <span class=""><span class="badge badge-danger btn btn-danger" ><?php

include("connexion.php");
  $resultat = $connexion->query("SELECT COUNT(*) AS nbComments FROM commentaire");

  if ($resultat) {
      $row = $resultat->fetch(PDO::FETCH_ASSOC);
echo  "". $row["nbComments"] ;

  } else {
      echo "Erreur : " . $connexion->error;
  }

?></span></span>
        </a>

 
    <div style="width:500px; padding-top:250px;">
      <a href="#" class="d-flex align-items-center text-white text-center text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="projet3.png" alt="" width="50" height="60" class="rounded-circle me-3" style='margin-left:50px ; padding-bottom:10px '>
        <a class="d-none d-sm-inline" style='font-size:18px ; color:black ; margin-left:70px ; '>Admin</a>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">

       <a class="dropdown-item" href="logOut.php" style='margin-left:10px'> <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out </a>
      </ul>
    </div>


</div>
</aside>
</div>
<main class='col'>

    <div style='display:flex ; margin-top:10px ; margin-bottom:10px ; ' class="d-flex justify-content-center align-items-center">              
    <div style='text-align:center ;padding-right:40px ; color: #F2A922' >
  <h5><i class="fa-solid fa-person"></i> Visitors </h5> <span style='font-size:29px ; '>
  <?php
include("connexion.php");
$resultat = $connexion->query("SELECT COUNT(*) AS nbVisiteurs FROM Visiteur ");

    if ($resultat) {
        $row = $resultat->fetch(PDO::FETCH_ASSOC);
        echo  "". $row["nbVisiteurs"] ;
    } else {
        echo "Erreur : " . $connexion->error;
    }
  ?>
  </div>
        <div style=' text-align:center ;padding-right:40px ; ' >           
    <h5><i class="fa-solid fa-layer-group"></i> projects</h5> <span style='font-size:29px ; '>
    <?php
include("connexion.php");
$resultat = $connexion->query("SELECT COUNT(*) AS nbProjects FROM Projet");

if ($resultat) {
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
echo  "". $row["nbProjects"] ;

} else {
    echo "Erreur : " . $connexion->error;
}

?>
</span>
</div>
<div style='text-align:center ;padding-right:40px ;' >
  <h5><i class="fa-solid fa-user"></i> Clients</h5> <span style='font-size:29px ; '>
  <?php
include("connexion.php");
$resultat = $connexion->query("SELECT COUNT(*) AS nbClients FROM Client");

if ($resultat) {
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
echo  "". $row["nbClients"] ;

} else {
    echo "Erreur : " . $connexion->error;
}

?>
</div>
<div style='text-align:center ;padding-right:40px ;' >
  <h5><i class="fa-solid fa-square-phone"></i> Contacts </h5> <span style='font-size:29px ; '>
  <?php
include("connexion.php");
$resultat = $connexion->query("SELECT COUNT(*) AS nbContacts FROM Contact");

if ($resultat) {
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
echo  "". $row["nbContacts"] ;

} else {
    echo "Erreur : " . $connexion->error;
}

?>

</div>

<div style='text-align:center ;padding-right:40px ;' >
  <h5><i class="fa-regular fa-comments"></i> Comments</h5> <span style='font-size:29px ; '>
  <?php
include("connexion.php");
$resultat = $connexion->query("SELECT COUNT(*) AS nbComments FROM Commentaire");

if ($resultat) {
    $row = $resultat->fetch(PDO::FETCH_ASSOC);
echo  "". $row["nbComments"] ;

} else {
    echo "Erreur : " . $connexion->error;
}

?>
</div>

  </div>
  <div class='container' style="padding-top:20px ;" >
  <div style='margin-right:0px ; background-color:white ; width:224px ;padding-top:40px ; padding-left:10px'>
   <h5 style="text-align:center"> <i class="fa-solid fa-clipboard-list" style="padding-right:6px"></i>  To do list</h5><br>
    <ul>
    <li style='list-style-type:square'>Add customers</li>
    <li style='list-style-type:square'>Add projects</li>
    <li style='list-style-type:square'>Edit projects</li>
    <li style='list-style-type:square'>Edit clients</li>
    <li style='list-style-type:square'>Add administrators</li>
    <li style='list-style-type:square'>Check received contacts</li>
    <li style='list-style-type:square'>read the comments</li>
  </ul>
  </div>
  <img src='Highcharts.png' width="1050px" >
</div>
<br>
<div>
<img src="success.png" width="400px" >
<img src="team_Projet.png" width="400px" height="280px" style="padding-left:0px">
<img src="reunion.png" width="400px" height="280px" style="padding-left:0px">
</div>
</main>

</div>
</body>

 







  