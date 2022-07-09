<?php session_start(); ?>


<?php 
include_once('db/conn.php');

?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
        if (isset($_GET['edit_student'])) {

            $sid=mysqli_real_escape_string($conn,($_GET['edit_student']));
            $sql_selects="SELECT * FROM student_registration WHERE idStudent='$sid'  LIMIT 1";
            $run_s = mysqli_query($conn,$sql_selects);
          
        while($row_s=mysqli_fetch_array($run_s)){
          $idStudent = $row_s['idStudent'];
          $FName = $row_s['FName'];
          $LName = $row_s['LName'];
          
          $Country = $row_s['Country'];
          $Tp = $row_s['Tp'];
          $Email = $row_s['Email'];
          $Courseid = $row_s['Courseid'];
                        
}}


        ?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Edit Student</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Student / Edit Student</li>
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
							<label for="inputEmail4">Frist Name</label>
							<input type="text" class="form-control" name="fname" value="<?php echo $FName; ?>">
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Last Name</label>
							<input type="text" class="form-control" name="lname"  value="<?php echo $LName; ?>">
							</div>
						
							<div class="form-group col-md-6">
							<label for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="semail"  value="<?php echo $Email; ?>">
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Telephone Number</label>
							<input type="number" class="form-control" name="stp"  value="<?php echo $Tp; ?>">
							</div>

   

							<div class="form-group col-md-6">
							<label >Select Cource</label>
								<select name="course" class="form-control" require>
								<option> <?php echo $Courseid; ?></option>
								<?php
                              
                                $get_course = "select * from courses";
                                $run_course = mysqli_query($conn, $get_course);
                                                    
                                while ($row_course=mysqli_fetch_array($run_course)) {
                                    $idCourse = $row_course['idCourse'];
                                    $CName = $row_course['CName'];
                                                        
                                    echo "<option value='$idCourse'> $CName </option>";
                                } ?>
								</select>
							</div>

              <div class="form-group col-md-6">
							<label >Country</label>
								<select name="country" class="form-control" require>
								<option> <?php echo $Country; ?></option>
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
                            <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary form-control" name="update" value="Update Student" >
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

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $semail = $_POST['semail'];
  $stp = $_POST['stp'];

  $course = $_POST['course'];
  $Country = $_POST['country'];

    $update_student = "UPDATE student_registration SET FName='$fname',LName='$lname', Country='$Country', Tp='$stp',Email='$semail', Courseid='$course'
    WHERE idStudent='$sid' LIMIT 1";
    $run_update=mysqli_query($conn,$update_student);
    if ($run_update) {
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
      header('location:manage_students.php'); 
      }else {?>

      <script>
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Please try again',
          timer: 7000
          
          })
      </script> 
<?php    }  header('location:manage_students.php'); }}?>