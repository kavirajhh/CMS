    
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
        <h2 class="pageheader-title"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Sent Invoices</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <!--  <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Student / Manage Student</li> -->
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
                                <th>No</th>
                                <th>Frist Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Position</th>
                                <th>Program</th>
                                <th>Source</th>
                                <th>Initial Price</th>
                                <th>Discount</th>
                                <th>Sub Total</th>
                                <th>No's</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $i=0;
                                $totaleuro=0;            
                                $USER_ID=$_SESSION['idUsers'];

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
                                
                                    $get_invoice = "SELECT * FROM student_registration WHERE delstatus=0 AND Country='$con_id' order by invoiceno DESC";
                                    $run_invoice = mysqli_query($conn, $get_invoice);
                                
                                    while ($row_invoice=mysqli_fetch_array($run_invoice)) {
                                        $idStudent = $row_invoice['idStudent'];
                                        $SFName = $row_invoice['FName'];
                                        $SLName = $row_invoice['LName'];
                                        $Country = $row_invoice['Country'];
                                        $Email  = $row_invoice['Email'];
                                        $Courseid = $row_invoice['Courseid'];
                                        $Coursefee = $row_invoice['CourseFee'];
                                        $discount = $row_invoice['discount'];
                                        $SenderId = $row_invoice['SenderId'];
                                        $date = $row_invoice['date'];
                                        $organizaton = $row_invoice['organizaton'];
                                        $position = $row_invoice['position'];
                                        $invno = $row_invoice['invoiceno'];
                                        $no_part = $row_invoice['no_part'];
                                        $con_tro=$row_invoice['contact_through'];
                                    $i++; ?>
                            
                            <tr>
                                
                                <td> <?php echo $invno; ?> </td>
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
                                <td align=right><?php echo $con_tro; ?></td>
                                
                                <?php
                                $get_curency = "SELECT * FROM country WHERE code='$countrycode'";
                                $run_curency = mysqli_query($conn, $get_curency);

                                while ($row_curency=mysqli_fetch_array($run_curency)) {
                                    $currency_rate = $row_curency['currency_rate'];
                                    $currency = $row_curency['currency'];

                                    $discountprice=$Coursefee*$discount;
                                    $discountprice=$discountprice/100;
                                    $subtot=$Coursefee-$discountprice;
                                         
                                        
                                    $totaleuro=$totaleuro+$subtot;
                                    $gtotal=$subtot*$no_part;
                                    echo "<td align=right>$currency ". number_format($Coursefee,2)."</td>";
                                    echo "<td align=right>$discount</td>";
                                    echo "<td align=right>";
                                    echo $currency.' '.number_format($subtot, 2); ?> <?php //echo $currency; ?>
                                    </td>
                                                            
                                <td align=right><?php echo number_format($no_part,0); ?></td>
                                <td align=right><?php echo $currency.' '.number_format($gtotal,2); ?></td>
                                
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