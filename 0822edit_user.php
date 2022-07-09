<?php session_start(); ?>


<?php 
include_once('db/conn.php');

?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');

        if (isset($_GET['edit_user'])) {

            $uid=mysqli_real_escape_string($conn,($_GET['edit_user']));
            $uql_selects="SELECT * FROM users WHERE idUsers='$uid'  LIMIT 1";
            $run_u = mysqli_query($conn,$uql_selects);
          
        while($row_u=mysqli_fetch_array($run_u)){
          $idUsers = $row_u['idUsers'];
          $Username = $row_u['Username'];
          $pw = $row_u['pw'];
          $FName = $row_u['FName'];
          $LName = $row_u['LName'];
          $ustatus = $row_u['ustatus'];
          $TP = $row_u['TP'];
          $countrycode = $row_u['countrycode'];
          $email = $row_u['email'];
    }
}


        ?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Edit Course</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Course / Edit Course</li>
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
            <?php  include_once('db/error.php');  ?>
            <div class="panel-body">


            <div>
            <form  method="POST" enctype="multipart/form-data">
						<div class="form-row" style="margin-top: 20px;">

                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Username</label>
							<input type="text" class="form-control" name="un" value="<?php echo  $Username; ?>" require>
							</div>
                            
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Password</label>
							<input type="text" class="form-control" name="psw" value="<?php echo $pw; ?>" require>
							</div>
                            
                            <div class="form-group col-md-6">
							<label for="inputEmail4">Frist Name</label>
							<input type="text" class="form-control" name="fname" value="<?php echo  $FName; ?>" require>
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Last Name</label>
							<input type="text" class="form-control" name="lname" value="<?php echo $LName; ?>" require>
							</div>
						
							<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="uemail" value="<?php echo $email; ?>" require>
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Telephone Number</label>
							<input type="number" class="form-control" name="utp" value="<?php echo $TP; ?>" require>
							</div>

							<div class="form-group col-md-6">
							<label >Country</label>
								<select name="country" class="form-control" require>
								<option> <?php echo $countrycode; ?></option>
								<?php
                              
                                $get_con = "select * from country";
                                $run_con = mysqli_query($conn, $get_con);
                                                    
                                while ($row_con=mysqli_fetch_array($run_con)) {
                                    $CountryName = $row_con['CountryName'];
                                    $code = $row_con['code'];
                                                        
                                    echo "<option value='$code'> $CountryName </option>";
                                } ?>
								</select>
							</div>

                            <div class="form-group col-md-6">
							<label >Status</label>
								<select name="status" class="form-control" require>
								<option> <?php echo $ustatus; ?></option>
								<?php
                              
                                $get_userst = "select * from userstatus";
                                $run_userst = mysqli_query($conn, $get_userst);
                                                    
                                while ($row_userst=mysqli_fetch_array($run_userst)) {
                                    $iduserstatus = $row_userst['iduserstatus'];
                                    $type = $row_userst['type'];
                                                        
                                    echo "<option value='$iduserstatus'> $type </option>";
                                } ?>
                                </select>
							</div>
                            
                            <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary form-control" name="update" value="+ Add User">
                            </div>
						</div>
					</form>
				    </div>
                    
			    </div>
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
if(isset($_POST['update'])){

    $un = $row_u['un'];
    $psw = $row_u['psw'];
    $fname = $row_u['fname'];
    $lname = $row_u['lname'];
    $uemail = $row_u['uemail'];
    $utp = $row_u['utp'];
    $country = $row_u['country'];
    $status = $row_u['status'];

    $update_user = "UPDATE users SET Username='$un',pw='$psw', FName='$fname',LName='$lname',ustatus='$status',TP='$utp',countrycode='$country',email='$uemail'
    WHERE idUsers='$uid' LIMIT 1";
    $run_user=mysqli_query($conn,$update_user);
    if ($run_user) {
      ?>

      <script>
          Swal.fire({
              title: "Success..!",
              text: "User has been successfully Aded ",
              icon: "success",
              button: "Aww yiss!",
              timer: 4000
          });
      </script>

      <?php 
      header('location:manage_users.php'); 
      }else {?>

      <script>
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Please try again',
          timer: 7000
          
          })
      </script> 
<?php    }  header('location:manage_users.php'); }}?>