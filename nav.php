<div class="col-sm-12">
	<?php if(isset($_SESSION["admin"])){?>
	<nav class="navbar navbar-dark bg-primary">
	<?php } else{ ?>
	<nav class="navbar navbar-dark bg-dark">
	<?php }?>
	  <a class="navbar-brand" href="#">
		<img src="images/fruit-stop.png" width="30" height="30" class="d-inline-block align-top" alt="">
		<span style="color: #ccc">Fruit-Stop</span>
	  </a>
	  <?php if(isset($_SESSION["user"])||isset($_SESSION["admin"])){?>
	  <a class="btn btn-warning" href="index.php?action=logout">Log out</a> 
	  <?php } else{ ?>
	  <a class="btn btn-warning" href="login.php">Login</a>
	  <?php }?>
	</nav>				
</div>