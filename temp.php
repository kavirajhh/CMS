<?php session_start(); ?>

<?php include_once('db/conn.php');

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
    include_once('header.php');
include('fun.php'); 
include('fun2.php'); 
//$tgst=0;
$gst=0;
$gd=0;
$rst=0;
$cst=0;

// to calculate total course fees

// echo "<table border=1 width=80%>";
// echo "<tr><td colspan=5> From $start To $end </td></tr> ";



?>
 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
<head><title>Sales Report</title></head>
<body>
    
    
<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-row"> 
                    <h2 class="pageheader-title" style="margin-bottom: 50px;"><i class="fa fa-filter" aria-hidden="true"></i>Sales Summary</h2>
                </div>
                <form action="" method="GET">
                <div class="form-row">
                    <div class="form-group col-lg-2">
                        <label for="">From</label>
                        <input type="date" name="from_date" id='from_date'  value="<?php if (isset($_GET['from_date'])) {echo $_GET['from_date'];
                            } ?>" class="form-control" required >
                    </div>

                    <div class="form-group col-lg-2">
                    <label for="">To</label>
                        <input type="date" name="to_date" day='to_date' value="<?php if (isset($_GET['to_date'])) {echo $_GET['to_date'];
                            } ?>" class="form-control" required>
                    </div>

                    <div class="form-group col-md-2">
							<label >Country</label>
								<select name="country" class="form-control">
								<option value='all'> All countries</option>
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
                    <label></label> <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    </div>

                </div>
            </form>



			<div class="table-responsive">
                    <table id="loadData1" class="table table-striped table-bordered table-hover display"><!-- table table-striped table-bordered table-hover begin -->
                        <thead>
                            <tr align='center' style='background-color: #4737aa;color: #fff;'>
                                
                               <!-- <th>Country Code</th> -->
                                <th>Country</th>
                                <th>Total Sales (EUR)</th>
                                <th>Country coordinator's Share (EUR)</th>
                                <th>Regional coordinator's Share (EUR)</th>
                                
                              
                            </tr>
                        </thead>
                        <tbody>
						<?php
							if (isset($_GET['country']) || isset($_GET['from_date']) && isset($_GET['to_date'])) {
								$start = $_GET['from_date'];
								$end = $_GET['to_date'];
								$select_country = $_GET['country'];
                                if($select_country!='all'){
								// $country=get_active_country($conn);
								
									$initotal=get_ini($conn,$start,$end,$select_country);
                                    // calculate reg shsre
                                    $reg_share=$initotal*get_share($conn,$select_country)/100; 
                                    $con_share=$initotal-$reg_share;
									$discount=get_dis($conn,$start,$end,$select_country);
									$gtotal=$initotal-$discount;
									$cname=country_name($conn,$select_country);
									//if you need get gtotal from function un comment line 93
									// $gtotal=get_total($conn,$cid,$start,$end); 
									echo "<tr><td> $cname</td>
                                        <td align=right>".number_format($initotal,2)." </td>
                                        <td align=right> ".number_format($con_share,2)."</td>
                                        <td align=right>".number_format($reg_share,2)." </td></tr>";
								    // calculate grande total
									$gst=$gst+ $initotal;  // tital sales
                                    $rst=$rst+$reg_share; // reganal share total
                                    $cst=$gst-$rst;
									$gd=$gd+$discount;

								//$tgst=$gst-$gd;
                            }
		 					else{
                                
                                $country=get_active_country_def($conn);
								foreach ($country as $cid)
								{ 
									//$initotal=get_ini_def($conn,$cid);
									//$discount=get_dis_def($conn,$cid);
									//$gtotal=$initotal-$discount;
                                    $initotal=get_ini($conn,$start,$end,$cid);
                                    $discount=get_dis($conn,$start,$end,$cid);
                                    // calculate reg shsre
                                    $reg_share=$initotal*get_share($conn,$cid)/100; 
                                    $con_share=$initotal-$reg_share;
                                    $gtotal=$initotal-$discount;
									$cname=country_name_def($conn,$cid);
									//if you need get gtotal from function un comment line 93
									// $gtotal=get_total($conn,$cid,$start,$end); 
									echo "<tr><td>$cname</td>
                                        <td align=right>".number_format($initotal,2)."</td>
                                        <td align=right>".number_format($con_share,2)."</td>
                                        <td align=right>".number_format($reg_share ,2)."</td></tr>";
								    // calculate grande total
									$gst=$gst+ $initotal;  // tital sales
                                    $rst=$rst+$reg_share; // reganal share total
                                    $cst=$gst-$rst;         // country share total
                                    $gd=$gd+$discount;
				
								}
								//$tgst=$gst-$gd;
                                
                                 } //  if($select_country!='all'){
                                 } //  if (isset($_GET['country']) || 

                               echo "<tr height=10px><td></td></tr>
                                    <tr style='background-color: #86868B;color: #fff;text-align: right;'>  
                                    <th> Monthly sales </th>  
                                    <th >".number_format($gst,2)."</th>
                                    <th >".number_format($cst,2)."</th>
                                    <th > ".number_format($rst,2)." </th>
                                    </tr>"; 
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
								
					aaSorting: [[1,'asc']],
                    // scrollY:        "300px",
                    // scrollX:        true,
                    // scrollCollapse: true,
                    // paging:         false,
                    // fixedColumns:   {
                    //     leftColumns: 1,
                    //     rightColumns: 1
                    // }

                    });
            });
</script>

 <?php  } ?>