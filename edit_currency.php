<?php session_start(); ?>


<?php 
include_once('db/conn.php');

?>
<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
        if (isset($_GET['edit_currency'])) {

            $cid=mysqli_real_escape_string($conn,($_GET['edit_currency']));
            $cql_selects="SELECT * FROM country WHERE code='$cid'  LIMIT 1";
            $run_c = mysqli_query($conn,$cql_selects);
          
        while($row_c=mysqli_fetch_array($run_c)){
          $countryname = $row_c['countryname'];
          $currency_rate = $row_c['currency_rate'];
          $currency = $row_c['currency'];


}
        
            $cql_shar="SELECT * FROM share WHERE countrycode='$cid'  LIMIT 1";
            $run_shar = mysqli_query($conn,$cql_shar);
        while($row_shar=mysqli_fetch_array($run_shar)){
          $share = $row_shar['share'];
}}
?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-usd" aria-hidden="true"></i> Edit Currency / Share</h2>
        
    </div>
  </div>
</div>
<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php  include_once('db/error.php');  ?>
            <div class="panel-body">


            <div>
            <form  method="POST" enctype="multipart/form-data" action='edit_currencyup.php'>
						<div class="form-row" style="margin-top: 20px;">

							<div class="form-group col-md-6">
							<label for="inputEmail4">Country Name</label>
							<input type="text" class="form-control" name="cname" value="<?php echo $countryname;?>" disabled>
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Currency Rate</label>
							<input type="text" class="form-control" name="crate" value="<?php echo $currency_rate;?>">
							</div>
              <input type='hidden' name=cid value=<?php echo $cid;  ?>>
              <div class="form-group col-md-6">
							<label for="inputPassword4">Share</label>
							<input type="text" class="form-control" name="share" value="<?php echo $share;?>" placeholder="%" onKeyPress="if(this.value.length==2) return false;">
							</div>

              <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary form-control" name="update" value="Update Currency">
              </div>
						</div>
					</form>
				  
			</div>
		</div>
	</div>
</div>


<?php include_once('footer.php') ?>
<script src="js/parsley.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<!--MainForm VALIDATE SCRIPT -->
<script>
    $(document).ready(function(){  
    $('#mainForm').parsley();
});  
</script>
<?php
/*if(isset($_POST['update'])){

    $crate = $_POST['crate'];
    $share_d = $_POST['share'];

    $update_rate = "UPDATE country SET currency_rate='$crate' WHERE code='$cid' LIMIT 1";
    $run_update=mysqli_query($conn,$update_rate);

    $update_share = "UPDATE share SET share='$share_d' WHERE countrycode='$cid' LIMIT 1";
    $run_share=mysqli_query($conn,$update_share);

    header('location: countries.php');
    if ($run_update) {
      ?>

      <script>
          Swal.fire({
              title: "Success..!",
              text: "Currency rate successfully updated",
              icon: "success",
              button: "Aww yiss!",
              timer: 4000,
              header('location: countries.php');
          });

      </script>
      <?php 
    //   header('location: countries.php'); 
      }else {?>

      <script>
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Please try again',
          timer: 7000
          
          })
      </script> 
<?php    }    
          }*/
          }

          ?>