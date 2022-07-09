    
<?php session_start(); ?>


<?php include_once('db/conn.php'); ?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
      
        ?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Add Users</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Student / Add Users</li>
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
            <div class="panel-body">


                <div>
                <form  method="POST" enctype="multipart/form-data">
						<div class="form-row" style="margin-top: 20px;">

                        <div class="form-group col-md-6">
							<label for="inputEmail4">Frist Name</label>
							<input type="text" class="form-control" name="fname" placeholder="Enter Frist Name" require>
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Last Name</label>
							<input type="text" class="form-control" name="lname" placeholder="Enter Last Name" require>
							</div>
						
							<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="uemail" placeholder="samplemail@gmail.com" require>
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Telephone Number</label>
							<input type="number" class="form-control" name="utp" placeholder="Enter Telephone No" require>
							</div>

							<div class="form-group col-md-6">
							<label >Country</label>
								<select name="country" class="form-control" require>
								<option selected disabled> Select Country</option>
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

                            <div class="form-group col-md-6">
                            <label for="inputPassword4">Designation</label>
                            <input type="text" class="form-control" name="des" placeholder="Enter Designation" require>
                            </div>

                            <div class="form-group col-md-6">
							<label >User type</label>
								<select name="status" class="form-control" require>
								<option selected disabled> Select a user type</option>
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
                                    <input type="submit" class="btn btn-primary form-control" name="usubmit" value="+ Add User">
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
if (isset($_POST['usubmit'])) {
    $ufname=mysqli_real_escape_string($conn, $_POST['fname']);
    $ulname=mysqli_real_escape_string($conn, $_POST['lname']);
    $ustatus=mysqli_real_escape_string($conn, $_POST['status']);
    $uemail=mysqli_real_escape_string($conn, $_POST['uemail']);
    $utp=mysqli_real_escape_string($conn, $_POST['utp']);
    $ucountry=mysqli_real_escape_string($conn, $_POST['country']);
    $des=mysqli_real_escape_string($conn, $_POST['des']);
        
    if (empty($ufname)) {
        array_push($error, "<br>frist name is required");
    }
    if (empty($ustatus)) {
       array_push($error, "<br>Status is required");
   }
   if (empty($uemail)) {
       array_push($error, "<br>email is required");
   }
  if (empty($utp)) {
      array_push($error, "<br>Telephone Number is required");
   }
   if (empty($ucountry)) {
       array_push($error, "<br>Country is required");
    }

    if (empty($des)) {
       array_push($error, "<br>Designation is required");
    }
            // $sql_select="SELECT * FROM student_registration WHERE nic='$snic' LIMIT 1";
            // $result=mysqli_query($conn, $sql_select);
            // $user=mysqli_fetch_array($result);

            // if ($user['Email']===$semail) {
            //             array_push($error);
            //             echo '<div class="alert alert-danger" role="alert">
            //             email already exists
            //             </div>'; 
            //         }
            // if ($user['nic']===$snic) {
            //             array_push($error);
            //             echo '<div class="alert alert-danger" role="alert">
            //             NIC already exists
            //             </div>';
            // }

       
                $sql="INSERT INTO users(Username,pw,FName,LName,ustatus,TP,countrycode,email,des) VALUES('$ufname','$ulname','$ufname','$ulname','$ustatus','$utp','$ucountry','$uemail','$des')";
                $run_Rproduct= mysqli_query($conn, $sql);
                if ($run_Rproduct) {
                    ?>
                    <script>
                    
                        Swal.fire({
                            title: "Success..!",
                            text: "User has been successfully Added ",
                            icon: "success",
                            button: "Aww yiss!",
                            timer: 4000
                        });
                        
                        
                    </script>
                    <?php }else {?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again',
                    timer: 7000
                    
                    })
                </script>
               
 <?php }}
 }?>