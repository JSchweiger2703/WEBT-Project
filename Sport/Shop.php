<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>Document</title>
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
              <a class="nav-link" href="#">Snowboard<span class="sr-only">(current)</span></a>
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

              if(!isset($_SESSION['loggedin']))
              {
                $_SESSION['loggedin'] = false;
              }

              if(!isset($_SESSION['failedRegister']))
              {
                $_SESSION['failedRegister'] = false;
              }
              
              if(!isset($_SESSION['failedLogin']))
              {
                $_SESSION['failedLogin'] = false;
              }
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
    <div class="container"><table class="table table-borderless" id='prods'>
      <tbody>
        <?php 
        $json = file_get_contents('http://localhost:3000/productdata');
        $prods = json_decode($json);
        $length = count($prods);
        echo '<tr>';
        
        for($i = 0; $i < $length; $i++)
        {
          if($i % 3 == 0)
          {
            echo '</tr><tr>';
          }

          $imgsrc = $prods[$i]->imagename;
          $nm = $prods[$i]->productname;
          $price = $prods[$i]->productprize;

            echo '<td><div class="card" style="width: 18rem;"><img class="card-img-top" src="' .$imgsrc.'"><div class="card-body"><h5 class="card-title">'.$nm.'</h5><button onclick="" class="btn btn-primary"> Add To Cart </button></div></div></td>';
        }
        ?>
      </tbody>
    </table></div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>