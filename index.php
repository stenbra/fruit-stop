<?php
session_start();
include("includes/db_connect.php");

if(isset($_GET["action"]) && !empty($_GET["action"])){
	if($_GET["action"]=="logout"){
		unset($_SESSION["user"]);
		unset($_SESSION["admin"]);
	}
}
if(isset($_GET["delete"])&& $_SESSION["admin"] && !empty($_GET["delete"])){
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
	
		<div class="container" id="wrap">
		
			<header class="row" id="black">
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
					
					<!--<input type="text" v-model="name" placeholder="search">
					<input type="button" v-on:click="search()" value="search">-->
				
					<?php if(isset($_SESSION["user"])||isset($_SESSION["admin"])){echo '<a class="btn btn-info" href="product-insert.php" style="float: right">insert a product</a>';}?>
					
				</div>
				<div class="col-sm-9">
					<div>	
						<div  v-for="result in product" class="product">
							<p><h3>{{result.name}}</h3>
							<h4>{{result.price}}€</h4></p>
						<?php if(isset($_SESSION["admin"])){?>
							<a class="btn btn-info" role="button" v-bind:href="'update.php?id=' + result.id">edit</a>
							<a class="btn btn-danger" role="button" v-bind:href="'<?php echo $_SERVER["PHP_SELF"]. '?delete='?>' + result.id">DELETE</a>
						<?php } ?>
						</div>
					</div>
					

				</div>
				<div class="col-sm-3">
					<div class="white">	
						<p>Bacon ipsum dolor amet chuck boudin short loin, ham hamburger pancetta kielbasa biltong brisket pork loin leberkas cow landjaeger salami. Frankfurter alcatra spare ribs, prosciutto jowl brisket jerky kielbasa tail.

Tongue pork loin prosciutto venison.</p>
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

