<?php 
include ("connection.php");
session_start();
$query= "UPDATE `users` SET diary='".mysqli_escape_string($connection,$_POST['diary'])."' WHERE id='".$_SESSION["id"]."' LIMIT 1";
mysqli_query($connection,$query);
print_r($_SESSION);
 ?>


 <form method="post">
 	<input type="text" name="diary">
 	<input type="submit" name="submit">
 </form>