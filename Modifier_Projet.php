<?php
session_start();
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
<header style="background-color: #E0E0E0; font-size: 20px;">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">
<a href="index2.php" style='color:black ; font-size:29px ;'> <i class='fa-solid fa-arrow-left'></i> </a>
</nav>
</div>
</header>
<body>
<?php
include("connexion.php");
$ProjetId=$_GET['ProjetId'];
$m=$connexion->query("SELECT * FROM Projet where Projet.ProjetId='$ProjetId'");
while($i = $m->fetch(PDO::FETCH_ASSOC)) {
    echo "
    <div class='container d-flex justify-content-center' style='padding-top :2px'>
    <div style='width:650px ; padding-right:50px ; background-color: white ; '>
    <form  action='' method='POST' style='margin:50px ; color:#333333 '>
    <img src='Modifier.png' style='padding-left:10px ; float:right' width='80px'>
    </br> </br> <br> <br>
    <h1 >Edit </h1>   
    <br> " ; 
    if(array_key_exists('errors' , $_SESSION)): 
      echo "<div class='alert alert-danger alert-dismissible fade show ' role='alert'> "
       . implode('<br>',$_SESSION['errors']) . 
     " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div> <br>";
    endif;
     unset($_SESSION['errors']);
   echo "<label class='form-label'>Id :</label>
   <input class='form-control' type='text'  value='$i[ProjetId]' name='ProjetId' readonly/> <br>
   Title : 
   <input class='form-control' type='text'  value='$i[Titre]' name='Titre' /> <br>
   Duration : 
   <input class='form-control' type='text'  value='$i[Duree]' name='Duree'/> <br>
  Start date :
   <input class='form-control' type='text' value='$i[Date]' name='Date'/>
   Logo :
   <input class='form-control' type='text' value='$i[logo]' name='logo'/>
   Littele Description :
   <input class='form-control' type='text' value='$i[pDescription]' name='pDescription'/>
   Description :
   <input class='form-control' type='text' value='$i[Description]' name='Description'/>";
   echo "</br><button type='submit' name='submit' class='btn btn-dark'><i class='fa-solid fa-pencil'></i> Edit </button>
   <a href='index2.php' type='submit' name='submit' class='btn btn-danger'> Cancel </a></form></div> 


   </div>";
   if(isset($_POST['submit'])){

    $errors=[];
    if(!array_key_exists('Titre' , $_POST) || $_POST['Titre'] ==''){
      $errors['Titre'] = "You have not entered the TITLE" ;
    }
    if(!array_key_exists('Duree' , $_POST) || $_POST['Duree'] ==''){
      $errors['Duree'] = "You have not entered the DURATION" ;
    }
    if(!array_key_exists('Date' , $_POST) || $_POST['Date'] ==''){
      $errors['Date'] = "You have not entered The START DATE " ;
    }
    if(!array_key_exists('pDescription' , $_POST) || $_POST['pDescription'] ==''){
      $errors['pDescription'] = "You have not entered The LITTLE DESCRIPTION " ;
    }
    if(!array_key_exists('Description' , $_POST) || $_POST['Description'] ==''){
      $errors['Description'] = "You have not entered The DESCRIPTION " ;
    }
   
    else{};
    if(!empty($errors)){
     
      $_SESSION['errors'] =$errors ;
      header("Location:modifier_Projet.php?ProjetId=" . $ProjetId . "");
    }
    else{
    $ProjetId=$_POST['ProjetId'];
    $Titre=$_POST['Titre'];
    $Duree=$_POST['Duree'];
    $Date=$_POST['Date'];
    $logo=$_POST['logo'];
    $pDescription=$_POST['pDescription'];
    $Description=$_POST['Description'];
    $n=$connexion->exec("UPDATE Projet SET Titre = '$Titre', Duree='$Duree', Date='$Date' , pDescription='$pDescription' , Description='$Description' , Logo='$logo' WHERE Projet.ProjetId = '$ProjetId';");
    if($n!=0){
		echo "modification valide" ;
        header("location:index2.php");
        
    }
    else
    echo " modification non valide";
}


}}

?>
</body>