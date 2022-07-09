    
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
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Manage Student</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Student / Manage Student</li>
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
                                <th></th>
                                <th>Frist Name:</th>
                                <th>Last Name:</th>
                                <th>Company:</th>
                                <th>Position:</th>
                                <th>Program:</th>
                                <th>Initial Price:</th>
                                <th>Discount:</th>
                                <th>Sub Total:</th>
                                <th>Action:</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php


                                $i=0;
                                $totaleuro=0;            
                                $USER_ID=$_SESSION['idUsers'];

                                if(isset($_POST['filter'])){
                                    $fDate=$_POST['day1'];
                                    $lDate=$_POST['day2'];
                                    $get_invoice = "SELECT * FROM student_registration WHERE date BETWEEN '$fDate' AND '$lDate'";
                                    $run_invoice = mysqli_query($conn, $get_invoice);
                           
                                }else{
                                    $get_invoice = "SELECT * FROM student_registration WHERE delstatus=0";
                                    $run_invoice = mysqli_query($conn, $get_invoice);
                                }
                                    while ($row_invoice=mysqli_fetch_array($run_invoice)) {
                                        $idStudent = $row_invoice['idStudent'];
                                        $SFName = $row_invoice['FName'];
                                        $SLName = $row_invoice['LName'];
                                        $Country = $row_invoice['Country'];
                                        $Email  = $row_invoice['Email'];
                                        $Courseid = $row_invoice['Courseid'];
                                        $discount = $row_invoice['discount'];
                                        $SenderId = $row_invoice['SenderId'];
                                        $date = $row_invoice['date'];
                                        $qStatus = $row_invoice['qStatus'];
                                        $organizaton = $row_invoice['organizaton'];
                                        $position = $row_invoice['position'];
                                    
                                    $i++; ?>
                            
                            <tr>
                                
                                <td> <?php echo $i; ?> </td>
                                <td> 
                                    <?php echo $SFName; ?> 
                                </td>
                                <td><?php echo $SLName; ?> </td>
                                <td><?php echo $organizaton; ?> </td>
                                <td><?php echo $position; ?> </td>
                               
                                <td>
                                <?php
                                        $get_Cours = "SELECT * FROM courses WHERE idCourse='$Courseid'";
                                        $run_Cours = mysqli_query($conn, $get_Cours);
                
                                        while ($row_Cours=mysqli_fetch_array($run_Cours)) {
                                            $idCourse = $row_Cours['idCourse'];
                                            $CName = $row_Cours['CName'];
                                            $fee = $row_Cours['fee'];
                                            $countrycode = $row_Cours['countrycode'];

                                            echo  $CName; ?> 
                                </td>
                                <td><?php echo $fee; ?></td>
                                <td><?php echo $discount; ?>%</td>
                                <td>
                                                                <?php
                                $get_curency = "SELECT * FROM country WHERE code='$countrycode'";
                                $run_curency = mysqli_query($conn, $get_curency);

                                while ($row_curency=mysqli_fetch_array($run_curency)) {
                                    $currency_rate = $row_curency['currency_rate'];
                                    $currency = $row_curency['currency'];

                                    $discountprice=$fee*$discount;
                                    $discountprice=$discountprice/100;
                                    $subtot=$fee-$discountprice;
                                    $tot=$subtot/$currency_rate;
                                    
                                    $totaleuro=$totaleuro+$tot;
                                    
                                    echo round($tot, 2); ?> €
                                </td>
                                                            

                                <td>
									<div class="dropdown">
										<a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
											<i class="fa fa-ellipsis-h"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="edit_student.php?edit_student=<?php echo $idStudent; ?>"><i class="fa fa-pencil"></i> Edit</a>
                                            <!-- <a class="dropdown-item d" href="send_mail.php?sendMail=<?php echo $idStudent; ?>"><i class="fa fa-paper-plane"></i> Send Invoice</a> -->
                                            <a class="dropdown-item d" href="delete.php?delete_student=<?php echo $idStudent; ?>" onclick="return confirm('Do Yo Want To Delete..')"><i class="fa fa-trash"></i> Delete</a>
										</div>
									</div>
                                </td>
                            </tr>
                            <?php
                                            }
                                        }
                                    }
                                   
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