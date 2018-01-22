<?php 

$id = $_GET['id'];
require_once 'class/product.class.php';
$product = new Product();
$product->id = $id;
echo $data = $product->delete();




 ?>