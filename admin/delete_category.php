<?php 

$id = $_GET['id'];
require_once 'class/category.class.php';
$category = new Category();
$category->id = $id;
echo $data = $category->delete();




 ?>