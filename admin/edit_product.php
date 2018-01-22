<?php
$id = $_GET['id'];
@session_start();
  require_once 'class/category.class.php';
 $category = new Category();
 $catdata = $category->lists();
 

 require_once 'class/product.class.php';
 $product = new Product();
 $product->id = $id;
 $pdata = $product->getProductByID();
 
 if(isset($_POST['save'])){
    $err = [];
    if(isset($_POST['title']) && !empty($_POST['title']) && trim($_POST['title'])){
        $product->set('title',$_POST['title']);
    }else{
        $err['title'] = 'Enter Title';
    }
 
    if(isset($_POST['short_description']) && !empty($_POST['short_description']) && trim($_POST['short_description'])){
        
          $product->set('short_description',$_POST['short_description']);
        
    }else{
        $err['short_description'] = 'Enter Description';
    }

     if($_FILES['feature_image']['error']==0){
         if($_FILES['feature_image']['type']=='image/jpeg'){
                if($_FILES['feature_image']['size']<=1000000){
                    $iname = uniqid().$_FILES['feature_image']['name'];
                    move_uploaded_file($_FILES['feature_image']['tmp_name'] , 'image/'.$iname);
                    $product->set('feature_image',$iname);
                }else{
                    $err['feature_image'] = 'File size should be less than 1 mb';
                }

            }else{
                $err['feature_image'] = 'File should be in jpeg format';
            }

        }else{
            $err['feature_image'] = 'Error in uploading image';
        }

        if(isset($_POST['price']) && !empty($_POST['price']) && trim($_POST['price'])){
        
          $product->set('price',$_POST['price']);
        
    }else{
        $err['price'] = 'Enter Price';
    }
  
    
    
      $product->set('slider_key',$_POST['slider_key']);
      $product->set('feature_key',$_POST['feature_key']);
      $product->set('category_id',$_POST['category_id']);
      $product->set('status',$_POST['status']);
      $product->set('modified_by',$_SESSION['admin_username']);
      $product->set('modified_date',date('Y-m-d H-i-s'));


      if(count($err)==0){
        $msg = $product->edit();
      }
}

require_once 'header.php'; 
?>






        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product Management</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action='' method='post' enctype="multipart/form-data">
                                        <?php if(isset($msg)){ echo $msg;} ?>

                                       
                                         <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name='category_id'>
                                                <option value=''> Select Category</option> 
                                                <?php foreach ($catdata as  $cdata) {?>
                                                <option value= '<?php echo $cdata->id;?>'>
                                                    <?php echo $cdata->name ?></option>
                                                 <?php } ?>
                                            </select>
                                           
                                        </div>


                                        <div class="form-group">
                                            <label>Title</label>
                                            <input name='title' value='<?php echo $pdata[0]->title ?>' class="form-control"> <?php if(isset($err['title'])){ echo $err['title'];} ?>
                                        
                                        </div>

                                         <div class="form-group">
                                            <label>Short Description</label>
                                            <textarea class="form-control"  name='short_description' > <?php echo $pdata[0]->short_description; ?></textarea> <?php if(isset($err['short_description'])){ echo $err['short_description'];} ?>
                                        
                                        </div>

                                       
                                       <div class="form-group">
                                            <label>Feature Image</label>
                                            <input type='file' value="<img src='image/<?php echo  $pdata[0]->feature_image ?>' >" name='feature_image' class="form-control">  <?php if(isset($err['feature_image'])){ echo $err['feature_image'];} ?>
                                        
                                        </div> 

                                          <div class="form-group">
                                            <label>Price</label>
                                            <textarea class="form-control"  name='price' > <?php echo $pdata[0]->price; ?></textarea> <?php if(isset($err['price'])){ echo $err['price'];} ?>
                                        </div>

                                      

                                        
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php if($pdata[0]->status==1) { ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="active" value="1" checked>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="deactive" value="0" >De-active
                                            </label>
                                            <?php }else{ ?>
                                             <label>Status</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="active" value="1" >Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="deactive" value="0" checked >De-active
                                            </label>
                                            <?php } ?>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Slider Key</label>
                                             <?php if($pdata[0]->slider_key==0) { ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="slider_key" id="yes" value="1">Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="slider_key" id="no" value="0" checked>No
                                            </label>
                                            <?php }else{ ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="slider_key" id="yes" value="1" checked>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="slider_key" id="no" value="0" >No
                                            </label>
                                            <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Feature Key</label>
                                             <?php if($pdata[0]->feature_key==0) { ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="feature_key" id="yes" value="1">Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="feature_key" id="no" value="0" checked>No
                                            </label>
                                            <?php }else{ ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="feature_key" id="yes" value="1" checked>Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="feature_key" id="no" value="0" >No
                                            </label>
                                            <?php } ?>
                                            
                                        </div>
                                        
                                        <button type="submit" name='save' class="btn btn-info">Update Product</button>
                                        <button type="reset" class="btn btn-danger">Clear</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

 <?php  require_once 'footer.php'; ?>