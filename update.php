<?php
session_start();
include("includes/db_connect.php");
if(isset($_SESSION["user"])||isset($_SESSION["admin"])){
	$Csql = "SELECT * FROM categories";
	$stmtDList=$conn->query($Csql);
if(isset($_GET["id"])&& !empty($_GET["id"])){
	
	$selectsql= "SELECT products.id,name,price,categories.category FROM products INNER JOIN ctp ON products.id = productid INNER JOIN categories ON categoryid = categories.id WHERE products.id=:id";
	$result=$conn->prepare($selectsql);
	$result -> execute([":id"=>$_GET["id"]]);
	$res = $result->fetch(PDO::FETCH_ASSOC);
	$curProd= $res["name"];
	$curCat= $res["category"];
	$curPrice= $res["price"];
	$id=$_GET["id"];
	

}
if(isset($_POST) && !empty($_POST)){
	$sql1="UPDATE products SET name=:namee,price=:prais WHERE id=:id";
	$res=([
		":namee"=>$_POST["productname"],
		":prais"=>$_POST["price"],
		":id"=>$_POST["id"]
	]);
	$result2= $conn->prepare($sql1);
	$result2->execute($res);
	
	
	$pow=0;
	while($row = $stmtDList->fetch(PDO::FETCH_ASSOC)){
		if($_POST["category"]==$row["category"]){
			$pow=1;
		}
	}
	
	if($pow==1){
	$catsql="SELECT * FROM categories WHERE category=:category";
	$ress=([
		":category"=>$_POST["category"]
	]);
	$result4= $conn->prepare($catsql);
	$result4->execute($ress);
	$re = $result4->fetch(PDO::FETCH_ASSOC);
	$catID = $re["id"];
	
	
	
	
	$sql2="UPDATE ctp SET categoryid=:cid WHERE productid=:id";
	$resu=([
		":cid"=>$catID,
		":id"=>$_POST["id"]
	]);
	$result3= $conn->prepare($sql2);
	$result3->execute($resu);
	header("Location: index.php");
	}
	else{
		$loc="Location: "."update.php?id=".$_POST["id"];
		header($loc);
	}
}
}
else{
	header("Location: index.php");
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>product-edit</title>
</head>

<body class="text-center">
	
		<div class="container" id="wrap">
			<header class="row">
				<?php include("nav.php");?>
			</header>
	
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<img src="images/fruit-stop.png" alt width="120px" height="120px">
		
		<h1>Edit a product</h1> 
		<label for="productname">Productname</label>
		
		<input type="hidden" name="id" value="<?php  echo $id ?>">
		
		<input type="text" name="productname" id="productname" value="<?php echo $curProd;?>" required><br>
		
		<label for="price">Price</label>
		<input type="number" min="0" step="0.01" name="price" id="price" value="<?php echo $curPrice;?>" required><br>
		
		<label for="category">Category</label>
		<input type="text" name="category" id="category" list="categorylist" value="<?php echo $curCat;?>" required><br>
		<datalist id="categorylist">
		<?php while($row = $stmtDList->fetch(PDO::FETCH_ASSOC)){?>
		<option value="<?php echo $row["category"]?>">
		<?php } ?>
		</datalist>
				
		
		<button type="submit" class="btn btn-outline-success">update product</button>
		
		
		
		
	</form>
	</div><!--no more container-->

	<!-------------------------------------------------------------->
	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
