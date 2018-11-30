<?php
$id = $_GET["id"];
$basket = [];
if (isset($_COOKIE["basket"])){
	$basket = json_decode($_COOKIE["basket"]);
}
array_push($basket,$id);
setcookie("basket",json_encode($basket));
?>
<a href="index2.php">Back</a>
