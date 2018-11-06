<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>product-insert</title>
</head>

<body class="text-center">
	
		<div class="container">
			<header class="row">
				<?php include("nav.php");?>
			</header>
	
	<form method="post" action="index.php">
		<img src="images/fruit-stop.png" alt width="120px" height="120px">
		
		<h1>Insert a product</h1> 
		<label for="productname">Productname</label>
		<input type="text" name="productname" id="productname" placeholder="Your username" required><br>
		
		<label for="price">Price</label>
		<input type="number" min="0" step="0.01" name="price" id="price" required><br>
		
		<label for="category">Category</label>
		<input type="text" name="category" id="category" required><br>
		
		<label for="tag">Tag</label>
		<input type="text" name="tag" id="tag" required><br>
		<br>
		
		<button type="submit" class="btn btn-outline-success">add product</button>
		
		
		
		
	</form>
	</div><!--no more container-->

	<!-------------------------------------------------------------->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>