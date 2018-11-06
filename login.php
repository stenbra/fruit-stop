<?php
session_start();
include("includes/db_connect.php");

if(isset($_POST) && !empty($_POST)){
	
	$sql= "SELECT * FROM login WHERE 
	username=:username AND password=:password LIMIT 1";
	
	$row = [
		":username"=>$_POST["username"],
		":password"=>md5($_POST["password"])
	];
	$res= $conn->prepare($sql);
	$res->execute($row);
	if($res->fetchColumn()<1){
		$output = "User not found, do you want to sign up?";
	}
	else{

		$_SESSION["user"] = 1;
		header("Location: index.php");
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
		
		<h1>Sign in</h1> 
		<?php if(!empty($output)){echo "<h3>".$output."</h3>";}?>
		<label for="username">Username</label><br>
		<input type="text" name="username" id="username" placeholder="Your username" required><br>
		<label for="password">Password</label><br>
		<input type="password" name="password" id="password" required><br>
		<br>
		<button type="submit" class="btn btn-outline-success">sign in</button>
		<a href='signup.php' class='btn'>sign up?</a>
		
		
		
	</form>
	</div><!--da end of da containa-->
	
	
	<!-------------------------------------------------------------->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
