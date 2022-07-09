<?php
session_start();
 if (!isset($_SESSION['Username'])) {
     echo "<script>window.open('index.php','_self')</script>";
      }

 else {
        include('db/conn.php');
        include('hzdef/mydef.php');
        include_once('header.php');
        
     ?>
<head>
</head>
<body>

<div class="row"><br>
    <?php 
    // print update status 
    // inv_footer_up.php , update_bankdetailup.php
    if(isset($_REQUEST['msg'] ) ) 
    {echo '<div class="alert alert-success">'.$_REQUEST['msg'].'</div>';} 
    ?>
</div>   
<!-- end status message row  -->

<div class="row">
    
    <div class="imgh col-md-6">
       <h2 align=right><b>Invoice Management System</b></h2>
        <img src="images/home3.png" width="400px" align=right>
    </div> 


    <div class="card shadow" >
        <div class="card-header text-white d-flex" style="background-color: #4637aae1;">    
        <h5 class="card-title mr-auto p-2">
          <img  src="images/flags-medium/<?php echo $_SESSION['countrycode']; ?>.png" width="60" height="40" style="margin-top: 5px; margin-bottom: 9px;">
        This Month Summery </h5>
        </div>
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                               <div class="row align-items-center no-gutters"> 
                                    <div class="col mr-2">
                                        
                                      <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                            <span><h6><b>Total Quotations Sent</b></h6></span>
                                        </div>
                                       
                                    </div>
                                    <?php
                                      $quodate=date("Ym");
                                      $get_country=$_SESSION['countrycode'];
                                      $last_quo=$get_country.$quodate;
                                      $quo_count=quo_no($conn,$last_quo);
                                    ?>
                                    <div class="col-auto"><h1><?php echo $quo_count; ?></h1></div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                               <div class="row align-items-center no-gutters"> 
                                    <div class="col mr-2">
                                        
                                      <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                            <span><h6><b>Total Invoices Sent</b></h6></span>
                                        </div>
                                       
                                    </div>
                                    <?php
                                      $invdate=date("Ym");
                                      $get_country=$_SESSION['countrycode'];
                                      $last_inv=$get_country.$invdate;
                                      $inv_count=inv_no($conn,$last_inv);
                                    ?>
                                    <div class="col-auto"><h1><?php echo $inv_count; ?></h1></div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                               <div class="row align-items-center no-gutters"> 
                                    <div class="col mr-2">
                                        
                                      <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                            <span><h6><b>Total Programs</b></h6></span>
                                        </div>
                                       
                                    </div>
                                    <?php
                                      
                                      $get_country=$_SESSION['countrycode'];
                                     
                                      $pro_count=my_programs($conn,$get_country);
                                    ?>
                                    <div class="col-auto"><h1><?php echo $pro_count; ?></h1></div>
                                </div>
                            </div>
                        </div>

                        <div class="card shadow border-left-primary py-2">
                            <div class="card-body">
                               <div class="row align-items-center no-gutters"> 
                                    <div class="col mr-2">
                                        
                                      <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                            <span><h6><b></b></h6></span>
                                        </div>
                                       
                                    </div>
                                    <?php
                                      
                                      $get_country=$_SESSION['countrycode'];
                                      $currency=currency($conn,$get_country);
                                      $rate=currency_rate($conn,$get_country);
                                    ?>
                                    <div class="col-auto"><h2><?php echo '1 EUR = '.$rate.' '.$currency; ?></h2></div>
                                </div>
                            </div>
                        </div>


    </div>
    <!-- end Monthly Sales Report card  -->
    
    <!-- end main image coloum  -->

</div> 
<!-- end mid row  -->
<div class="row">


</div>

</body>



<?php 
include_once('footer.php'); 

} // end else --> if (!isset($_SESSION['Username']))
?> 
