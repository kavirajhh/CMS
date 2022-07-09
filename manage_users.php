    
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
        <h2 class="pageheader-title"><i class="fa fa-user-times" aria-hidden="true"></i>Manage Users</h2>
      
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

            <table id="loadData4" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Count: </th>
                               <!-- <th>User Id: </th> -->
                                <th>Country </th>
                                <th>User name: </th>
                                <th>Tp: </th>
                                <th>email</th>
                                <th>User status: </th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php
          
                                $i=0;
                                                    
                                $get_user = "SELECT * FROM users WHERE delstatus=0";         
                                $run_user = mysqli_query($conn, $get_user);
                                
                                while ($row_user=mysqli_fetch_array($run_user)) {
                                    $idUsers = $row_user['idUsers'];
                                    $Username = $row_user['Username'];
                                    $pw = $row_user['pw'];
                                    $FName = $row_user['FName'];
                                    $ustatus = $row_user['ustatus'];
                                    $TP = $row_user['TP'];
                                    $countrycode = $row_user['countrycode'];
                                    $email  = $row_user['email'];
                     
                                    

                                    $i++; ?>
                            
                            <tr>
                                <td> <?php echo $i; ?> </td>
                               <!-- <td> <?php //echo $idUsers; ?> </td> -->
                                <td>
                                <img  src="images/flags/<?php echo $countrycode;?>.png">
                               
                                <?php
                                 $get_cont = "SELECT * FROM country WHERE code='$countrycode'";         
                                 $run_cont = mysqli_query($conn, $get_cont);
                                
                                 while ($row_cont=mysqli_fetch_array($run_cont)) {
                                     $CountryName = $row_cont['countryname'];

                                     echo $CountryName;
                                ?>
                           
                                <td><?php echo $FName; ?> </td>
                                <td> <?php echo $TP; ?> </td>
                                <td><?php echo $email ?> </td>

                                <td>
                                <?php
                                $get_u = "SELECT * FROM userstatus WHERE iduserstatus='$ustatus'";         
                                $run_u = mysqli_query($conn, $get_u);
                                
                                while ($row_u=mysqli_fetch_array($run_u)) {
                                    $type = $row_u['type'];

                                    echo $type;
                                ?>
                                </td>
                                <td>
										<div class="dropdown">
											<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="fa fa-ellipsis-h"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												

                                <!--
												<a class="dropdown-item" href="#?edit_user=<?php echo $idUsers; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            -->
                                                <a class="dropdown-item d" href="delete.php?delete_user=<?php echo $idUsers; ?>" onclick="return confirm('Do you want to delete?')"><i class="fa fa-trash"></i> Delete</a>


											</div>
										</div>
                                    </td>
                            </tr>
                            <?php }}}?>
                            
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
                $('#loadData4').DataTable();
            });
</script>

</body>
               
 <?php  } ?>