<?php
 require_once 'header.php';
require_once 'class/category.class.php';
$category = new Category();
$ldata = $category->lists();

  ?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Naya Bazar||Online Shopping</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category Management</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category Listing 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Rank</th>
                                        <th>Status</th>
                                        <th>Created by</th>
                                        <th>Modified by</th>
                                        <th>Created date</th>
                                        <th>Modified date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               <tbody>
                                 <?php $i=1;
                                    foreach ($ldata as $ld) { ?>
                                   <tr class="odd gradeX">
                                   
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $ld->name;?></td>
                                        <td><?php  echo $ld->rank ;?></td>
                                        <td ><?php  if( $ld->status==1){
                                             echo "<label class='label label-success'>Active</label>";
                                        } else{
                                            echo "<label class='label label-danger'>Deactive</label>"; 
                                        } ?></td>
                                        <td><?php  echo $ld->created_by ;?></td>
                                        <td><?php  echo $ld->modified_by ;?></td>
                                        <td><?php  echo $ld->created_date ;?></td>
                                        <td><?php  echo $ld->modified_date ;?></td>
                                        <td><a href='edit_category.php?id=<?php echo $ld->id ?>' class="btn btn-warning"><i class='fa fa-pencil'></i>Edit/</a>
                                            <a href='delete_category.php?id=<?php echo $ld->id ?>' class="btn btn-danger" onclick="return confirm('Are you  sure to delete this?');">
                                                <i class="fa fa-trash"></i>Delete</a></td>
                                       
                                    </tr>
                                     <?php } ?>
                               </tbody>
                            </table>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
           
         
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

    <!-- /#wrapper -->

    <?php require_once 'footer.php'; ?>

    <!-- jQuery -->
   
    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

