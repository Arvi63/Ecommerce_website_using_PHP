<?php 
require_once 'header.php';
require_once 'admin/class/product.class.php';
$product  = new Product();




//$title = $_POST['search_bar'];
$product->set('search',$_POST['search_bar']);
  
  $cproduct = $product->getProductBySearchTitle();

 
 ?>

<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
      <li>&#187;</li>
      <li><a href="#">Grand Parent</a></li>
      <li>&#187;</li>
      <li><a href="#">Parent</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#">Child</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
  
    <ul>
    <?php foreach ($cproduct as $cn) { ?>
       <a href="single.php?id=<?php echo $cn->id; ?>"><li><?php echo $cn->title; ?></li> </a>
    <?php } ?>
    </ul>
    
    <br class="clear" />
  </div>
</div>
<?php include_once 'footer.php'; ?>