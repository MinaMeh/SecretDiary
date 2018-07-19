 <?php 
$error="";
if (isset($_POST['submit'])){
	if (!isset($_POST['email'])) $error.="Please enter your email </br>";
	else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))  $error="Please enter a valide email address </br>";
	if (!isset($_POST["password"])) $error.="Please enter your password </br>";
	else {
		if (strlen($_POST["password"])<8) $error.="Please enter a password of at least 8 characters </br>";
			if (!preg_match("`[A-Z]`", $_POST["password"])) $error.="Please include at least one capital letter </br>";

	}
	if($error!="")
	{
		echo "there are errors in your sign up details:".$error;
	}
	else{
		$connection=mysqli_connect("localhost","root","","SecretDiary");
		$query="SELECT * FROM `users` WHERE `email`='".mysqli_real_escape_string($connection,$_POST['email'])."'";
		$result= mysqli_query($connection,$query);
		$results=mysqli_num_rows($result);
		if ($results) echo "That e-mail addres is already registered.Do you want to login?";
		else{
			$query="INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($connection,$_POST['email'])."','". md5(md5($_POST['email']).$_POST['password'])."')";
			mysqli_query($connection,$query);
			echo "You've been Signed up!";
		}
	}
}


 ?>
 <form method="post">
 	<input type="email" name="email" id="email">
 	<input type="password" name="password" id="password">
 	<input type="submit" name="submit" value="Sign Up">
 </form>
