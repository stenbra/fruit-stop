<?php
session_start();
include("includes/db_connect.php");

if(isset($_GET["action"]) && !empty($_GET["action"])){
	if($_GET["action"]=="logout"){
		unset($_SESSION["user"]);
	}
}
if(isset($_GET["delete"])&& $_SESSION["user"] && !empty($_GET["delete"])){
	$deletesql= "DELETE FROM products WHERE id=:id";
	$res=$conn->prepare($deletesql)->execute([":id"=>$_GET["delete"]]);
	if($res){
		//$output = "Product deleted";
	}
	else{
		//$output= "could not delete the product";
	}
}



include("head.php");
?>
	</head>
	<body>
	
		<div class="container">
		
			<header class="row">
			<?php include("nav.php");?>
			</header>
			
			<div class="row">
				<div class="col">
				

			<div class="row"  id="app" style="margin-top: 15px">
				<div class="col-sm-12">
					<a class="btn btn-secondary" @click="allRecords()" href="#">All</a>
					<a class="btn btn-secondary" @click="recordFruit()" href="#">Fruits</a>
					<a class="btn btn-secondary" @click="recordBerry()" href="#">Berries</a>
					<a class="btn btn-secondary" @click="recordVeg()" href="#">Vegetables</a>
					
					<?php if(isset($_SESSION["user"])){echo '<a class="btn btn-info" href="product-insert.php" style="float: right">insert a product</a>';}?>
					
				</div>
				<div class="col-sm-12">
					<div>	
						<div  v-for="result in product" style="background-color: #999;margin: 10px 15px; padding:15px">
							<p>{{result.name}}
							{{result.price}}€</p>
							<a class="btn btn-alert" role="button" v-bind:href="'<?php echo "update.php?id="?>' + result.id">edit</a>
							<a class="btn btn-danger" role="button" v-bind:href="'<?php echo $_SERVER["PHP_SELF"]. '?delete='?>' + result.id">DELETE</a>
						</div>
					</div>
					

				</div>
				
			</div><!-- end of main content-->
			
			<footer class="row">
				<div class="col">
				</div>
			</footer>
			
		</div><!-- end of container-->
	<!---------------------- bootstrap 
	--------------------------------------------------------->
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
	<script src="JS/productselect.js"></script>
	</body>
</html>

