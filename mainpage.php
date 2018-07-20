<<?php 
  session_start();
  include ("connection.php");
  if (isset($_SESSION['id'])){
  $query= "SELECT diary FROM `users` WHERE id='".$_SESSION['id']."' LIMIT 1";
  $result=mysqli_query($connection,$query);
  $row=mysqli_fetch_array($result);
  $diary=$row['diary'];
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title> Secret Diary </title>
	<meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <script type="text/javascript" src="jquery.min.js"></script>
 
  <script src="js/bootstrap.min.js"></script>
  
  <script type="text/javascript" src=""></script>
</head>
<body data-spy="scroll" data-target=".navbar-collapse">
<nav class="navbar fixed-top navbar-dark bg-dark ">
 <div class="navbar-header float-left">
  <a class="navbar-brand" href="#">My Secret Diary</a>
  </div>
  <div class="  float-right">
    <ul  class="navbar-nav nav float-right ">
      <li id="left" > <a  id="white" href="index.php?logout=1"> Log Out</a></li>
    </ul>
  </div>
</nav>
<div id="home" class="part">
	<div class="row" >
		<div class="col-md-6 offset-md-3" id="topTitle">
			<textarea name="diary" class="form-control">
        <?php echo $diary; ?>
      </textarea>
		</div>
	</div>
</div>

</body>
<script type="text/javascript">
	$(".part").css("min-height",$(window).height());
  $("textarea").css("height",$(window).height()-120);
  $("textarea").keyup(function(){
    $.post("updatediary.php",{diary:$("textarea").val()});
  });
</script>
</html>