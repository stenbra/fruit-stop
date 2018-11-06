<?php
session_start();

if(isset($_GET) && !empty($_GET)){
if($_GET["action"]=="logout"){
	unset($_SESSION["user"]);
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
				

			<div class="row" style="margin-top: 15px">
				<div class="col-sm-10">
					<a class="btn btn-secondary" href="#">All</a>
					<a class="btn btn-secondary" href="#">Fruits</a>
					<a class="btn btn-secondary" href="#">Berries</a>
					<a class="btn btn-secondary" href="#">Vegetables</a>
					
					<?php if(isset($_SESSION["user"])){echo '<a class="btn btn-info" href="product-insert.html" style="float: right">insert a product</a>';}?>
					
				</div>
				<div class="col-sm-2">
					<h1>Size</h1>
				</div>
				<div class="col-sm-10">
					<div style="background-color: #666666;height: 700px; padding: 15px; overflow: hidden"><div style="background-color: #aaaaaa;margin: 10px; width: 60%;overflow: hidden"><h3>product</h3><h4>pris: XXX</h4><a class="btn btn-success" href="#" style="float: right">BUY</a></div></div>
					

				</div>
				<div class="col-sm-2">
					<a class="btn" href="#">Large</a><br>
					<a class="btn" href="#">Medium</a><br>
					<a class="btn" href="#">Small</a><br>
					<a class="btn btn-danger" href="#">clear size</a><br>
				</div>
				
			</div><!-- end of main content-->
			
			<footer class="row">
				<div class="col">
				</div>
			</footer>
			
		</div><!-- end of container-->
	<!---------------------- bootstrap 
	--------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	</body>
</html>
