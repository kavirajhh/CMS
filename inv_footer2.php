    
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
        <h2 class="pageheader-title"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Invoice Footer</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <!-- <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Reports / Sent Quotations</li> -->
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
            <div class="panel-body">


            <div class="table-responsive">
                    <table id="loadData1" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                        <tr>
                                <th>Country</th>
                                <th>Company Name </th>
                                <th>Registration No</th>
                                <th>Address No</th>
                                <th>Address Street</th>
                                <th>Address City</th>
                                <th>Telephone No 01</th>
                                <th>Telephone No 02</th>
                                <th>Email</th>
                                <th>Web site</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
<?php


    function country_by_user($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM users where idUsers='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $con_id=$row['countrycode'];
                                }
                                return $con_id;

                    }

$con_id=country_by_user($conn,$_SESSION['idUsers']);

$sql = "SELECT * FROM footer WHERE con_id='$con_id' limit 1 ";
$rs = mysqli_query($conn, $sql);
if ($rs->num_rows > 0){
            while ($row=mysqli_fetch_array($rs)) 
            {                           
                $con_id = $row['con_id'];
                $f_name = $row['f_name'];
                $f_reg_no = $row['f_reg_no'];
                $f_add_no = $row['f_add_no'];
                $f_add_street = $row['f_add_street'];
                $f_add_city = $row['f_add_city'];
                $f_tp_land = $row['f_tp_land'];
                $f_tp_mo = $row['f_tp_mo'];
                $f_mail = $row['f_mail'];
                $f_web = $row['f_web'];
                $i++; 

                ?>
                            
                <tr>
                    
                    <td> <?php echo $con_id; ?> </td>
                    <td> <?php echo $f_name; ?></td>
                    <td> <?php echo $f_reg_no; ?> </td>
                    <td> <?php echo $f_add_no; ?> </td>
                    <td> <?php echo $f_add_street; ?> </td>
                    <td> <?php echo $f_add_city; ?> </td>
                    <td> <?php echo $f_tp_land; ?> </td>
                    <td> <?php echo $f_tp_mo; ?> </td>
                    <td> <?php echo $f_mail; ?> </td>
                    <td> <?php echo $f_web; ?> </td>
                </tr>
<?php
        }// end while 
    } // end if
                                    
                                   
?> 
                            
                </tbody>
            </table>
       
		</div>            
        </div>
        </div>
</div>
</div>
</div>
<?php include_once('footer.php') ?>
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData1').DataTable();

            });
</script>
</body>

               
 <?php  } ?>