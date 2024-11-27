<?php
session_start();

?>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <style>
   section {
    padding: 50px;
    background-size: cover ;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    font-family: "Open Sans", sans-serif;
    color: #333333;
  }
.box-form {
    margin: 0 auto;
    width: 90%;
    background: #FFFFFF;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex: 1 1 100%;
    align-items: stretch;
    justify-content: space-between;
    box-shadow: 0 0 20px 2px #090b6f85;
   
  }
  @media (max-width: 980px) {
    .box-form {
      flex-flow: wrap;
      text-align: center;
      align-content: center;
      align-items: center;
    }
  }
  .box-form div {
    height: auto;
  }
  .box-form .left {
    color: #FFFFFF;
    background-color : #E0E0E0 ; 
    background-size: cover;
    background-repeat: no-repeat;
   
    overflow: hidden;
  }
  .box-form .left .overlay {
    padding: 30px;
    width: 100%;
    height: 100%;
    overflow: hidden;
    box-sizing: border-box;
  }
  .box-form .left .overlay img {
  
   
    font-weight: 900;
    margin-top: 40px;
    margin-bottom: 1px;
  }
  .box-form .left .overlay span p {
    margin-top: 30px;
    font-weight: 900;
    
  }
  .box-form .left .overlay span a {
    color: #FFFFFF;
    margin-top: 10px;
    padding: 14px 50px;
    border-radius: 100px;
    display: inline-block;
    box-shadow: 0 3px 6px 1px #042d4657;
  }
  .box-form .left .overlay span a:last-child {
    background: #F2A922 ;
    color: white;
    margin-left: 30px;
  }
  .box-form .right {
    padding: 90px;
    overflow: hidden;
  }
  @media (max-width: 980px) {
    .box-form .right {
      width: 100%;
    }
  }
  
  .box-form .right p {
    font-size: 14px;
    color: #B0B3B9;
  }
  .box-form .right .inputs {
    overflow: hidden;
  }
  .box-form .right input {
    width: 100%;
    padding: 10px;
    margin-top: 25px;
    font-size: 16px;
    border: none;
    outline: none;
    border-bottom: 2px solid #B0B3B9;
  }

  .box-form .right button {
    color: #fff;
    font-size: 16px;
    padding: 12px 40px;
    margin-left:60px ;
    border-radius: 50px;
    display: inline-block;
    border: 0;
    outline: 0;
    background-color : #F2A922 ;
    text-align:center;
  }
  
  p{
    padding: 10px;
  }
   </style>
</head>
<body style=' background-color : #E0E0E0 ; '>
<a href='index.php'>
<img src='xtensus_logo.png' width='50px' style='float:left ; margin-left:29px ; margin-top:20px ' ></a>
<section class="min-vh-100">
    <form action="accueil_Administrateur.php" class="box-form" method="POST">
        <div class="left">
          <div class="overlay" >
        <div class=" d-flex justify-content-center">
        <img src="login.png" width="1000px" ></div>
        <p></p>
        <br>
        <span>
        <a style="text-decoration: none;" href="index.php">Go back to list projects </a>
        </span>
        </div>
        </div>
        <div class="right">
        <br><br>  <div style='display:flex'> <img src='Utilisateur.png' width='50px' height='50px'><br> <p> Please Enter your user name and password below. </p> </div>
        <div class="inputs">
        <input type="text" placeholder="user name" name="username">
        <br>
        <div class="input-group">
        <input type="password" placeholder="password" name="password"  id="passwordField" style='width:250px'>
       
        <i class="fa-regular fa-eye-slash input-group-text" id="togglePasswordIcon" onclick="togglePasswordVisibility()"></i>

        </div>
</div>
        <br><br>
        
        <br>
        <button type="submit" name="valider">Login</button>
        </div>
    </form>
</section>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById('passwordField');
        var togglePasswordIcon = document.getElementById('togglePasswordIcon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            togglePasswordIcon.classList.remove('far', 'fa-eye-slash');
            togglePasswordIcon.classList.add('far', 'fa-eye');
        } else {
            passwordField.type = 'password';
            togglePasswordIcon.classList.remove('far', 'fa-eye');
            togglePasswordIcon.classList.add('far', 'fa-eye-slash');
            
        }
    }
</script>

</body>