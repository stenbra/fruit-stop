<?php
include('includes/db_connect.php');
 
 
if(isset($_GET['id']) && !empty($_GET['id'])){
	$id = $_GET['id'];
    $q_select = "SELECT products.id,name,price FROM products INNER JOIN ctp ON products.id = productid INNER JOIN categories ON categoryid = categories.id WHERE categories.id=:id";
    $stmt = $conn->prepare($q_select);
    $stmt->execute([':id' => $id]);
 
} 
else if(isset($_GET['name']) && !empty($_GET['name'])){
	$name = $_GET['name'];
    $q_select = "SELECT * FROM products WHERE name=:name";
    $stmt = $conn->prepare($q_select);
    $stmt->execute([':name' => $name]);
}

else {
  $q_select = "SELECT * FROM products";
  $stmt = $conn->query($q_select);
  $stmt->execute();
}
 
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($res, JSON_UNESCAPED_UNICODE);
 
print_r($json);
?>