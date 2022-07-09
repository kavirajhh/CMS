<?php session_start(); ?>


<?php 
include_once('db/conn.php');

?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');

        if (isset($_GET['edit_course'])) {

            $cid=mysqli_real_escape_string($conn,($_GET['edit_course']));
            $cql_selects="SELECT * FROM courses WHERE idCourse='$cid'  LIMIT 1";
            $run_c = mysqli_query($conn,$cql_selects);
          
            while($row_c=mysqli_fetch_array($run_c)){
              $idCourse = $row_c['idCourse'];
              $CName = $row_c['CName'];
              $fee = $row_c['fee'];


}}


        ?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Edit Program</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <!--  <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Course / Edit Course</li> -->
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
            <form  method="POST" action='edit_courseup.php' enctype="multipart/form-data">
						<div class="form-row" style="margin-top: 20px;">

							<div class="form-group col-md-6">
							<label for="inputEmail4">Program Name</label>
							<input type="text" class="form-control" name="cname" value="<?php echo $CName;?>">
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Program Fee</label>
							<input type="text" class="form-control" name="cfee" value="<?php echo $fee;?>">
							</div>
              <input type="hidden" class="form-control" name="cid" value="<?php echo $idCourse;?>">
              <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary form-control" name="update" value="Update program">
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
/*
if(isset($_POST['update'])){

  $cname = $_POST['cname'];
  $cfee = $_POST['cfee'];
  $cduration = $_POST['cduration'];


    $update_course = "UPDATE courses SET CName='$cname',fee='$cfee'
    WHERE idCourse='$cid' LIMIT 1";
    $run_update=mysqli_query($conn,$update_course);
    if ($run_update) {
      ?>

      <script>
          Swal.fire({
              title: "Success..!",
              text: "Program has been successfully updated ",
              icon: "success",
              button: "Aww yiss!",
              timer: 4000
          });
      </script>

      <?php 
      header('location:manage_courses.php'); 
      }else {?>

      <script>
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Please try again',
          timer: 7000
          
          })
      </script> 
<?php    }  header('location:manage_courses.php'); }
*/
}

?>