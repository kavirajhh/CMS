    
<?php session_start(); ?>


<?php include_once('db/conn.php'); ?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
      
        ?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Manage User Status</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / User Status / User Status</li>
            </ol>
          </nav>
        </div>
    </div>
  </div>
</div>
<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php include_once('db/error.php'); ?>
            <div class="panel-body"><div>


            <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="loadData"><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Count: </th>
                                <th>type </th>
                                <th>privilages </th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php
          
                                $i=0;
                                                    
                                $get_users = "SELECT * FROM userstatus";         
                                $run_users = mysqli_query($conn, $get_users);
                                
                                while ($row_users=mysqli_fetch_array($run_users)) {
                                    $iduserstatus = $row_users['iduserstatus'];
                                    $type = $row_users['type'];
                                    $privilages = $row_users['privilages'];
                                    $i++; ?>
                            
                            <tr>
                                <td> <?php echo $iduserstatus; ?> </td>
                                <td><?php echo $type; ?> </td>
                                <td><?php echo $privilages; ?> </td>

                                <td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												

                                
												<a class="dropdown-item" href="product_cash_edit.php?edit_products=<?php echo $iduserstatus; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                <a class="dropdown-item d" href="products_cash_delete.php?delete_product=<?php echo $iduserstatus; ?>" onclick="return confirm('Do Yo Want To Delete..')"><i class="fa fa-trash"></i> Delete</a>


											</div>
										</div>
                                    </td>
                            </tr>

                            <?php } ?>
                            
                        </tbody>
                    </table>
                </div>

		</div>            
	</div>
</div>


<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData').DataTable();
            });
        </script>
<script src="js/parsley.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<!--MainForm VALIDATE SCRIPT -->

<script>
    $(document).ready(function(){  
    $('#mainForm').parsley();
});  
</script>

           

               
 <?php  } ?>