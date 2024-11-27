
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
    .a1{color:black ; text-decoration:none; font-weight:bold , color:#435d7d }
   .a2{color:red ; }
   </style>
</head>
<body style="background-color : #E0E0E0">
<header style="background-color: #E0E0E0; font-size: 20px;">
    <div class="container">
      <nav class="navbar navbar-dark navbar-expand-lg">
<a href="accueil_administrateur.php" style='color:black ; font-size:29px'> <i class='fa-solid fa-arrow-left'></i> </a>

  
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav5" aria-controls="navbarNav5" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon "></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-end ml-auto" id="navbarNav5">
          <ul class="navbar-nav mr-auto">
          
         
          
           
            <a href=Login.php style="font-size: 20px;" class="btn btn-warning ml-md-3">Log Out</a>
          </ul>
  
          
        </div>
        <a class="navbar-brand" href="accueil_administrateur.php">
          <img src="xtensus_logo.png" height="60" alt="image" style="padding-left:20px ">
        </a>
      </nav>
    </div>
  </header>
<br> <br>

<h1 style="text-align : center ; color:black; font-size:40px " ><em> List of projects  </em>      <img src="projet10.png" width="500px"></h1>

<div class="container">
<div class="container">


        <form  class="row"  method='POST'>
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
        <br> <br>
        </form>
        <br>
 
    
   

        <?php
            if (isset($_POST['valider'])) {
                include("connexion.php");
                $counter = 0;

                $searchTitle = $_POST['searchTitle'];

                
                    $query = "SELECT * FROM Projet  WHERE Projet.Titre LIKE '%$searchTitle%' ";
                

                $result = $connexion->query($query);
                
                while ($m = $result->fetch(PDO::FETCH_ASSOC)) {
                  if ($counter % 3 == 0) {
                    echo "<div class='row row-cols-3'>";
                  }
                    
                    echo "
                    <div class='col-md-4'>
                    <div class='card mb-3' style='max-width: 550px;'>
                  <div class='row g-0'>
                  <div class='col-md-8' style='width:100% ; text-align:center'>
                  <div class='card-body' >
                  <br>

                        <h5 class='card-title' style= '  color:#435d7d '>  " . $m['Titre'] . "</h5>
                        <h6 style='text-align : center '>" . $m['pDescription'] . "</h6> </br>

                        <a style='color:#435d7d ; font-weight:bold' href=Detaille_Projet2.php?ProjetId=" . $m['ProjetId'] . " class='a1'><i class='fa-solid fa-circle-info'></i> more details</a><br>
                        <div style='float: right; '><a href=modifier_Projet.php?ProjetId=" . $m['ProjetId'] . " class='a1'><i class='fa-solid fa-pencil'></i></a>
                                      <a href=supprimer_Projet.php?ProjetId=" . $m['ProjetId'] . " class='a2' onclick='confirmation(event)' ><i class='fa-solid fa-trash'></i></a>
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
                $aff = $connexion->query("SELECT * FROM Projet  ");
                while ($m = $aff->fetch(PDO::FETCH_ASSOC)) {
                  if ($counter % 3 == 0) {
                    echo "<div class='row row-cols-3'>";
                }
      echo "
      <div class='col-md-4'>
      <div class='card mb-3' style='max-width: 540px;'>
    <div class='row g-0'>
      <div class='col-md-8' style='width:100% ; text-align:center'>
        <div class='card-body' >
          <br> <h5 class='card-title' style= ' color:#435d7d ' > " . $m['Titre'] . "</h5>
          <h6 style=' text-align : center '>" . $m['pDescription'] . "</h6></br>

          <a style='color:#435d7d ; font-weight:bold' href=Detaille_Projet2.php?ProjetId=" . $m['ProjetId'] . " class='a1' ><i class='fa-solid fa-circle-info'></i> more details</a> </br>
          <div style='float: right; '><a href=modifier_Projet.php?ProjetId=" . $m['ProjetId'] . " class='a1'><i class='fa-solid fa-pencil'></i></a>
                        <a href=supprimer_Projet.php?ProjetId=" . $m['ProjetId'] . " class='a2'  onclick='confirmation(event)'><i class='fa-solid fa-trash'></i></a> <br><br> </div></div>
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
        <script type="text/javascript">
            function confirmation(ev){
                ev.preventDefault();
                var urlToRedirect=ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect) ;
                swal({
                    title:"Are you sure to delete this " , 
                    text:"You won't be able to revert this delete " ,
                    icon : "warning" , 
                    buttons : true , 
                    dangerMode:true ,  
                })

                .then((willCancel)=>
                {
                    if(willCancel)
                    {
                        window.location.href=urlToRedirect ;
                    }
                }) ;
            }
        </script>
</div>
</div>

        





