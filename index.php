<?php include("login.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title> My Secret Diary </title>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <script type="text/javascript" src="jquery.min.js"></script>
 
  <script src="js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src=""></script>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">My Secret Diary</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
    <form method="post" class="form-inline my-2 my-lg-0">
      <input name="loginemail" class="form-control mr-sm-2 navbar-right" type="text" placeholder="Email" value="<?php if (isset($_POST['email']))  echo addslashes($_POST['email']);?>">
       <input name="loginpassword" class="form-control mr-sm-2 navbar-right" type="password" placeholder="password" value="<?php  if (isset($_POST['password'])) echo addslashes($_POST['password']);?>">
      <input class="btn btn-success my-2 my-sm-0 navbar-right" type="submit" name="submit" value="Log In">Log in</input>
    </form>
  </div>
</nav>
<div id="home" class="part">
	<div class="row" >
		<div class="col-md-6 offset-md-3" id="topTitle">
			<h1> My Secret Diary</h1>
			<p class="lead"> Your Secret Private Diary with you wherever you go</p>
      
      <p  class="bold margintop"> Intresseted? Sign Up below</p>
      <?php 
      	if ($error) {
      		echo '<div class="alert alert-danger">'.addslashes($error).' </div>';
      	}
      	if ($success){
      		echo '<div class="alert alert-success">'.$success.'.</div>';
      	}
       ?>
      <form class="margintop" method="post">
        <div class="form-group">
          <label  for="email"> Email address</label>
         <input class="form-control" type="email" name="email" id="email" placeholder="Your Email" value="<?php if (isset($_POST['email']))  echo addslashes($_POST['email']);?>">

        </div>
        <div class="form-group">
          <label for="password"> Your password</label>
         <input class="form-control" type="password" name="password" id="password" placeholder="Your Password" value="<?php  if (isset($_POST['password'])) echo addslashes($_POST['password']);?>">

        </div>
        <input class="btn btn-success  btn-lg" type="submit" name="submit" value="Sign Up"></input>
      </form>
		</div>
	</div>
</div>

</body>
<script type="text/javascript">
	$(".part").css("min-height",$(window).height());
</script>
</html>