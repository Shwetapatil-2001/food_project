<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact.css">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>$(document).ready(function(){
        $('.slider').bxSlider({ auto:true, mode:'fade', controls:false, pager:true, touchEnabled:false, speed: 1000 });
             
        });
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
      .whatsapp-button {
      background-color:green;
      color: white;
      border: none;
      padding: 15px 20px;
      margin-left: 400px;
      margin-bottom: 145px;
      margin-top: 20px;
      font-size: 16px;
      border-radius: 15px;
      cursor: pointer;
      }
      
      .contact{
      margin-left: 400px;
      margin-top: 150px;
      }
      
      .contact1{
      margin-left: 100px;
      margin-top: 50px;
      }
    </style>
</head>
<body class="body1">
    <div class="section">
    <div class="container">              
    
       <nav class="navbar navbar-expand-lg navbar-light">
       <img src="images/logo1.png" height="80px" width="80px">
       <a class="navbar-brand" href="images\l.png"></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
           <a class="nav-link" href="index.php"><h5>Home</h5></a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="about.php"><h5>About Us</h5></a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="products.php"><h5>Products</h5></a>
          </li>
                
          <li class="nav-item">
            <a class="nav-link" href="contactus.php"><h5>Contact Us</h5></a>
          </li>
 
          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle btn btn-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Register
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="hms/admin_registration.php">Admin Registration</a>
                            <a class="dropdown-item" href="hms/user_registration.php">User Registration</a>
                          </div>
          </li>
          <li> 
            <a class="nav-link" href="cart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span id='cart-item'> </span></a>
          </li>                      
        </ul>
        </div>
      </nav>
    </div>
    </div>
    </div>   
</body>    