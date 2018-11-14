<?php
session_start();
include("includes/db_connect.php");
if(isset($_SESSION["user"])||isset($_SESSION["admin"])){
	$Csql = "SELECT * FROM categories";
	$stmtDList=$conn->query($Csql);

	
	
	if(isset($_POST) && !empty($_POST)){
	$pow=0;
	while($row = $stmtDList->fetch(PDO::FETCH_ASSOC)){
		if($_POST["category"]==$row["category"]){
			$pow=1;
		}
	}
	
	
	if($pow==1){
	$inposter =0;	
	
	$checkSQL="SELECT * FROM products";
	$checkStmn=$conn->query($checkSQL);
	while($roow = $checkStmn->fetch(PDO::FETCH_ASSOC)){
		if($roow["name"] == $_POST["productname"]){
			$inposter=1;
		}
		
	}
	if($inposter == 0){
	$sql="INSERT INTO products(name,price)
	VALUES(:productname,:price)";
	
	$result= $conn->prepare($sql);
	
	$res= $result->execute([
	":productname"=>$_POST["productname"],
	":price"=>$_POST["price"]
	]);

	if(!$res){
		$output = "Oops something went wrong, uproduct was not added!";
	}
	
	$SPsql= "SELECT id FROM products WHERE name =:productname LIMIT 1";
	$stmn = $conn->prepare($SPsql);
	$stmn->execute([":productname"=>$_POST["productname"]]);
	$resProd = $stmn->fetch();
	$prod= $resProd["id"];
	
	$SPsql= "SELECT id FROM categories WHERE category =:category";
	$stmn = $conn->prepare($SPsql);
	$stmn->execute([":category"=>$_POST["category"]]);
	$resCat = $stmn->fetch();
	$cat= $resCat["id"];
	
	
	$sqlin= "INSERT INTO ctp(productid,categoryid) VALUES($prod,$cat)";
	$res= $conn->prepare($sqlin)->execute();
	
	Header('Location: index.php');
	exit;

	}
	else{
		$output = "item already exists!";
	}
	}
	else{
		$output = "Please enter a valid category!";
	}
	}
}
else{
	unset($_SESSION["user"]);
	header("Location: index.php");
}


?>
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
	
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<img src="images/fruit-stop.png" alt width="120px" height="120px">
		
		<h1>Insert a product</h1> 
		<?php if(!empty($output)){echo "<h3 class='alert alert-warning'>".$output."</h3>";}?>
		<label for="productname">Productname</label>
		<input type="text" name="productname" id="productname" placeholder="Productname" required><br>
		
		<label for="price">Price</label>
		<input type="number" min="0" step="0.01" name="price" id="price" required><br>
		
		<label for="category">Category</label>
		<input type="text" name="category" id="category" list="categorylist" required><br>
		<datalist id="categorylist">
		<?php while($row = $stmtDList->fetch(PDO::FETCH_ASSOC)){?>
		<option value="<?php echo $row["category"]?>">
		<?php } ?>
		</datalist>
				
		
		<button type="submit" class="btn btn-outline-success">add product</button>
		
		
		
		
	</form>
	</div><!--no more container-->

	<!-------------------------------------------------------------->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
