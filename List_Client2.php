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
    body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
}
.table-wrapper {
    background: #fff;
    padding: 20px 25px;
    margin: 30px 0;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
    padding-bottom: 15px;
    background: white;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 40px;
}




table.table tr th, table.table tr td {
   
    padding: 12px 15px;
    vertical-align: middle;
}


    </style>
</head>
<body>

<div style="display:flex">
<div style="flex: 1;">
<?php
$ProjetId=$_GET['ProjetId'];
echo "<a href='detaille_projet2.php?ProjetId=" . $ProjetId . " ' style='color:black ; font-size:29px ; padding:20px ' > <i class='fa-solid fa-arrow-left'></i></a>" ;
?>
<img src="Contact.png" width="180px" ></div>
<div style="padding-top:10px">
             <a href=Login.php style="font-size: 20px ; float:right ; margin-right:50px" class="btn btn-warning ml-md-3" >Log Out</a>
             <a href="accueil_administrateur.php" style='text-decoration:none ;  float:right ; font-size: 20px ; color:black ; margin:20px ;margin-top:10px'>Menu</a>
</div>
</div>

<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2 style=" color:#F2A922">Contacts</h2>
                </div>
                
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <?php
                    include("connexion.php");
                    $ProjetId=$_GET['ProjetId'];
                    $aff=$connexion->query("SELECT *  FROM Projet  WHERE ProjetId='$ProjetId' ");
                    while($m = $aff->fetch(PDO::FETCH_ASSOC)) {
                echo " <th style='text-align: center ; font-size: 30px;' colspan='6'> " . $m['Titre'] . "</th> " ;} ?>
      </tr>
                <tr>
                   
                    
               
                    <th style=" text-align:center ;">LastName</th>
                    <th style=" text-align:center ;">FirstName</th>
                    <th style=" text-align:center ;">Phone</th>
                    <th style=" text-align:center ;">Mail</th>
                    <th style=" text-align:left ;">Message</th>
                    <th style=" text-align:center ;">Delete</th>
                </tr>
            </thead>
            <tbody>
                
                
                <?php
                
                
                include("connexion.php");
                
                    
                    $ProjetId=$_GET['ProjetId'];
                   
                    
                    $aff = $connexion->query("SELECT Nom, Prenom, Telephone , Email , Message , Contact.ProjetId , Projet.ProjetId , ContactId FROM Contact , Projet WHERE Contact.ProjetId=Projet.ProjetId  and  Contact.ProjetId='$ProjetId'");

                while ($m = $aff->fetch(PDO::FETCH_ASSOC)) {
                   
                    
                    
                    echo"<td style=' text-align:center ;'>" . $m['Nom'] . "</td>
                    <td style=' text-align:center ;'>" . $m['Prenom'] . "</td>
                    <td style=' text-align:center ;'>" . $m['Telephone'] . "</td>
                    <td style=' text-align:center ;'>" . $m['Email'] . "</td>
                    <td style=' text-align:left ;'>" . $m['Message'] . "</td>
                    <td style='text-align:center'><a class='btn btn-danger ms-2' href='Supprimer_Contact2.php?ContactId=" .$m['ContactId'] . "' onclick='confirmation(event)'><i class='fa-solid fa-xmark'></i></a></td>                    
                   
                </tr>" ;}
               
            
                
                ?>
                
               
               
            
                
            </tbody>
        </table>
        



                    
            
    
    </div>
</div>
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