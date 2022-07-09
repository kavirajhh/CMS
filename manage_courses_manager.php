    
<?php session_start(); ?>


<?php include_once('db/conn.php'); ?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
      
        ?>
<body>
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
  
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Manage programs</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Course / Manage Course</li> -->
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
                    <table id="loadData2" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                                <!-- <th >Count: </th> -->
                                <th class="table-plus datatable-nosort">Program name: </th>
                                <th>Program Fee:</th>
                                <th class="datatable-nosort" width=10%>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php
          
                                $i=0;
                                $filter_Countrywise =  $_SESSION['countrycode'];
                                $get_cou = "SELECT * FROM courses WHERE delstatus=0 AND countrycode='$filter_Countrywise'";
                                                        
                                $run_cou = mysqli_query($conn, $get_cou);
                                
                                while ($row_cou=mysqli_fetch_array($run_cou)) {
                                    $idCourse = $row_cou['idCourse'];
                                    $CName = $row_cou['CName'];
                                    $fee = $row_cou['fee'];
                                    $Countrycode = $row_cou['countrycode'];
                     
                      
                                    $i++; ?>
                            
                            <tr>
                               <!--  <td> <?php echo $i; ?> </td> -->
                                <td><?php echo $CName; ?> </td>
                                <td align=right> <?php 
                                $get_curency = "SELECT * FROM country WHERE code='$Countrycode'";
                                $run_curency = mysqli_query($conn, $get_curency);

                                while ($row_curency=mysqli_fetch_array($run_curency)) {
                                    $currency = $row_curency['currency'];
                                    echo $currency.' '.number_format($fee,2); ?> <?php //echo $currency;?> </td>
                
                                <td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">

												<a class="dropdown-item" href="edit_course.php?edit_course=<?php echo $idCourse; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                                <a class="dropdown-item d" href="delete.php?delete_course=<?php echo $idCourse; ?>" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash"></i> Delete</a>

											</div>
										</div>
                                </td>
                            </tr>
                            <?php  }} ?>
                            
                        </tbody>
                    </table>
                </div>

		</div>            
	</div>
</div>
</div>
</div>
</div>


<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData2').DataTable();

            });
</script>
</body>
                
 <?php  } ?>