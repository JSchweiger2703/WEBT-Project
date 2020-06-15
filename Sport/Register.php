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
              <a class="nav-link" href="Register.php">Sign Up</a>
            </li>    
          </ul>
        </div>
    </nav>
    <br>
    <div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	<a href="Login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
	<h4 class="card-title mt-2">Sign up</h4>
</header>
<article class="card-body">
<form action="post_userdata.php" method="post">
	<div class="form-row">
		<div class="col form-group">
			<label>First name </label>   
		  	<input type="text" name="first_name" class="form-control" placeholder="">
		</div>
		<div class="col form-group">
			<label>Last name</label>
		  	<input type="text" name="last_name" class="form-control" placeholder=" ">
		</div> 
	</div> 
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="user_name" class="form-control" placeholder="">
	</div> 
	<div class="form-row">
		<div class="form-group col-md-6">
		  <label>City</label>
		  <input name="city" type="text" class="form-control">
		</div>
		<div class="form-group col-md-6">
		  <label>Country</label>
		  <select name="country" id="inputState" class="form-control">
		    <option> Choose...</option>
		      <option>Austria</option>
		      <option>Germany</option>
		      <option>Switzerland</option>
		  </select>
		</div> <!-- form-group end.// -->
	</div> <!-- form-row.// -->
	<div class="form-group">
		<label>Create password</label>
	    <input name="user_password" class="form-control" type="password">
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="Login.php">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
</body>
</html>