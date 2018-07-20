 <?php 
 session_start();
 
 include("connection.php");
$error="";
$success="";
if (isset($_GET['logout']) AND isset($_SESSION['id']) AND $_GET['logout']==1){
 	session_destroy();
 	$success="you have been logged out";
 }
if (isset($_POST['submit']) AND $_POST['submit']=="Sign Up" ){
	if (!isset($_POST['email'])) $error.="Please enter your email </br>";
	else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))  $error="Please enter a valide email address </br>";
	if (!isset($_POST["password"])) $error.="Please enter your password </br>";
	else {
		if (strlen($_POST["password"])<8) $error.="Please enter a password of at least 8 characters </br>";
			if (!preg_match("`[A-Z]`", $_POST["password"])) $error.="Please include at least one capital letter </br>";

	}
	if($error!="")
	{
		//$error= "There where errors in your Sign Up form".$error;
	}
	else{
		
		$query="SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($connection,$_POST['email'])."'";
		$result= mysqli_query($connection,$query);
		$results=mysqli_num_rows($result);
		if ($results) $error= "That e-mail addres is already registered.Do you want to login?";
		else{
			$query="INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($connection,$_POST['email'])."','". md5(md5($_POST['email']).$_POST['password'])."')";
			mysqli_query($connection,$query);
			$success= "You've been Signed up!";
			$_SESSION['id']=mysqli_insert_id($connection);
			header("Location: mainpage.php");
		}
	}
}

	if (isset($_POST['submit']) AND $_POST["submit"]=="Log In"){

	
		$query="SELECT * FROM `users` WHERE `email`='".mysqli_escape_string($connection,$_POST["loginemail"])."' AND `password`='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
		$result=mysqli_query($connection,$query);
		$row=mysqli_fetch_array($result);
		if ($row){
			$_SESSION['id']=$row['id'];
			header("Location: mainpage.php");
		}
		else{
			$error= "Check your email and password";
		}
	}
 ?>