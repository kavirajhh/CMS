    
<?php session_start(); ?>

<?php include_once('db/conn.php'); ?>

<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
    

        ?>

<head><title>Invoice Report</title></head>
<body>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-row"> 
                    <h2 class="pageheader-title" style="margin-bottom: 50px;"><i class="fa fa-filter" aria-hidden="true"></i>Quotation Report</h2>
                </div>
                <form action="" method="GET">
                <div class="form-row">
                    <div class="form-group col-lg-2">
                        <label for="">from</label>
                        <input type="date" name="from_date" id='from_date'  value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control" >
                    </div>

                    <div class="form-group col-lg-2">
                    <label for="">to</label>
                        <input type="date" name="to_date" day='to_date' value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" >
                    </div>

                    <div class="form-group col-md-2">
							<label >Country</label>
								<select name="country" class="form-control">
								<option selected disabled value="<?php if(isset($_GET['country'])){ echo $_GET['country']; } ?>"> select country</option>
								<?php
                              
                                $get_con = "SELECT * FROM country WHERE select_status=1";
                                $run_con = mysqli_query($conn, $get_con);
                                                    
                                while ($row_con=mysqli_fetch_array($run_con)) {
                                    $CountryName = $row_con['countryname'];
                                    $code = $row_con['code'];
                                                        
                                    echo "<option value='$code'> $CountryName </option>";
                                } ?>
								</select>
					</div>

                    <div class="form-group col-lg-3">
                    <label>Click to Filter</label> <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>

<?php 
      if(isset($_GET['country']) || isset($_GET['from_date']) && isset($_GET['to_date']))
      {
          $from_date = $_GET['from_date'];
          $to_date = $_GET['to_date'];
          $country = $_GET['country']; ?>

            <div class="table-responsive">
                    <table id="loadData1" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>date</th>
                                <th>Frist Name:</th>
                                <th>Last Name:</th>
                                <th>Company:</th>
                                <th>Position:</th>
                                <th>Program:</th>
                                <th>Initial Price:</th>
                                <th>Discount:</th>
                                <th>Sub Total:</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php
                                    
                                    $i=0;
                                    $totaleuro=0;            
                                    $USER_ID=$_SESSION['idUsers'];

                                        $get_invoice = "SELECT * FROM student_registration2 WHERE date BETWEEN '$from_date' AND '$to_date' AND Country='$country' AND delstatus=0";
                                        $run_invoice = mysqli_query($conn, $get_invoice);
                                        
                                        while ($row_invoice=mysqli_fetch_array($run_invoice)) {
                                            
                                            $idStudent = $row_invoice['idStudent'];
                                            $SFName = $row_invoice['FName'];
                                            $SLName = $row_invoice['LName'];
                                            $Country = $row_invoice['Country'];
                                            $Email  = $row_invoice['Email'];
                                            $Courseid = $row_invoice['Courseid'];
                                            $CourseFee = $row_invoice['CourseFee'];
                                            $discount = $row_invoice['discount'];
                                            $SenderId = $row_invoice['SenderId'];
                                            $date = $row_invoice['date'];
                                            $organizaton = $row_invoice['organizaton'];
                                            $position = $row_invoice['position'];
                                    
                                            $i++; ?>
                            
                            <tr>
                                
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $date; ?> </td>
                                <td><?php echo $SFName; ?></td>
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
                                <td><?php echo $CourseFee; ?></td>
                                <td><?php echo $discount; ?>%</td>
                                <td>
                                <?php
                                $get_curency = "SELECT * FROM country WHERE code='$countrycode'";
                                                $run_curency = mysqli_query($conn, $get_curency);

                                                while ($row_curency=mysqli_fetch_array($run_curency)) {
                                                    $currency_rate = $row_curency['currency_rate'];
                                                    $currency = $row_curency['currency'];

                                                    if ($discount==0) {
                                                        $subtot=$CourseFee;
                                                    } else {
                                                        $discountprice=$CourseFee*$discount;
                                                        $discountprice=$discountprice/100;
                                                        $subtot=$CourseFee-$discountprice;
                                                    }                       
                                                                            
                                                        $totaleuro=$totaleuro+$subtot;

                                                    echo round($subtot, 2); ?> <?php echo $currency; ?>
                                </td>
                                                            

                            </tr>
                            <?php
                                                }
                                            }
                                        } ?> 
                            <tr>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #4637aab2; color: #fff;">Total:</td>
                                <td style="background-color: #4637aab2; color: #fff;"><?php echo round($totaleuro, 2); ?><?php echo $currency; ?></td>
                            </tr>  
                        </tbody>
                    </table>
<?php
            }else{
                ?>

<div class="table-responsive">
                    <table id="loadData1" class="table table-striped table-bordered table-hover display" ><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>date</th>
                                <th>Frist Name:</th>
                                <th>Last Name:</th>
                                <th>Company:</th>
                                <th>Position:</th>
                                <th>Program:</th>
                                <th>Initial Price:</th>
                                <th>Discount:</th>
                                <th>Sub Total:</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php
                                    
                                    $i=0;
                                    $totaleuro=0;            
                                    $USER_ID=$_SESSION['idUsers'];

                                        $get_invoice = "SELECT * FROM student_registration2 WHERE delstatus=0";
                                        $run_invoice = mysqli_query($conn, $get_invoice);
                                        
                                        while ($row_invoice=mysqli_fetch_array($run_invoice)) {
                                            
                                            $idStudent = $row_invoice['idStudent'];
                                            $SFName = $row_invoice['FName'];
                                            $SLName = $row_invoice['LName'];
                                            $Country = $row_invoice['Country'];
                                            $Email  = $row_invoice['Email'];
                                            $Courseid = $row_invoice['Courseid'];
                                            $CourseFee = $row_invoice['CourseFee'];
                                            $discount = $row_invoice['discount'];
                                            $SenderId = $row_invoice['SenderId'];
                                            $date = $row_invoice['date'];
                                            $organizaton = $row_invoice['organizaton'];
                                            $position = $row_invoice['position'];
                                    
                                            $i++; ?>
                            
                            <tr>
                                
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $date; ?> </td>
                                <td><?php echo $SFName; ?></td>
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
                                <td><?php echo $CourseFee; ?></td>
                                <td><?php echo $discount; ?>%</td>
                                <td>
                                <?php
                                $get_curency = "SELECT * FROM country WHERE code='$countrycode'";
                                                $run_curency = mysqli_query($conn, $get_curency);

                                                while ($row_curency=mysqli_fetch_array($run_curency)) {
                                                    $currency_rate = $row_curency['currency_rate'];
                                                    $currency = $row_curency['currency'];

                                                    if ($discount==0) {
                                                        $subtot=$CourseFee;
                                                    } else {
                                                        $discountprice=$CourseFee*$discount;
                                                        $discountprice=$discountprice/100;
                                                        $subtot=$CourseFee-$discountprice;
                                                    }                       
                                                                            
                                                        $totaleuro=$totaleuro+$subtot;
                                    
                                                    echo round($subtot, 2); ?> <?php echo $currency; ?>
                                </td>
                                                            

                            </tr>
                            <?php
                                                }
                                            }
                                        } ?> 
                            <tr>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #fff;"></td>
                                <td style="background-color: #4637aab2; color: #fff;">Total:</td>
                                <td style="background-color: #4637aab2; color: #fff;"><?php echo round($totaleuro, 2); ?>  <?php echo $currency; ?></td>
                            </tr>  
                        </tbody>
                    </table>
       <?php
            }?>         

		</div>            
	</div>
    </div>
</div>
</div>
</div>
<?php include_once('footer.php') ?>
</body>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>    
<script type="text/javascript">
            $(document).ready(function(){
                $('#loadData1').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                                ],
								
					aaSorting: [[1,'asc']]
                    });
            });
</script>
 <?php  } ?>