<?php
session_start();
include("includes/db_connect.php");


if(isset($_POST) && !empty($_POST)){
	$sql="INSERT INTO login(username,password)
	VALUES(:username,:password)";
	
	$result= $conn->prepare($sql);
	
	$res= $result->execute([
	":username"=>$_POST["username"],
	":password"=>md5($_POST["password"])
	]);
	if($res){
		$_SESSION["user"] = 1;
		header("Location: index.php");
	}
	else{
		$output = "Oops something went wrong, user was not added!";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>login</title>
</head>
	

<body class="text-center">
	
	<div class="container">
			<header class="row">
			<?php include("nav.php");?>
			</header>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<img src="images/fruit-stop.png" alt width="72px" height="72px">
		
		<h1>Sign up</h1> 
		<?php if(!empty($output)){echo "<h3 class='alert alert-warning'>".$output."</h3>";}?>
		<label for="username">Username</label><br>
		<input type="text" name="username" id="username" placeholder="Your username" required><br>
		<label for="password">Password</label><br>
		<input type="password" name="password" id="password" required><br>
		<br>
		<button type="submit" class="btn btn-outline-success">sign up</button>

		
		
		
	</form>
	</div><!--da end of da containa-->
	
	
	<!-------------------------------------------------------------->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
