<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Startseite.php">INFO</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Shop.php">Snowboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Skateboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ShopCart.html">CART</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item active">
              <?php 
              if($_SESSION['loggedin'])
              {
                echo '<a class="nav-link" href="Profile.php">Profile</a>';
              }
              else
              {
                echo '<a class="nav-link" href="Login.php">Sign in</a>';
              }
              ?>
            </li>
          </ul>    
        </div>
    </nav>
    <div class="container">
    <h1 class="page-head text-center">Profile</h1>
    <h2>Hello <?php $user = json_decode(file_get_contents('http://localhost:3000/userdata/.$_SESSION[\'userID\']'));
     ?>
</body>
</html>