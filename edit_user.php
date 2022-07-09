
<?php session_start(); ?>

<?php include('db/conn.php'); ?>
<?php 
if (!isset($_SESSION['Username'])) {
	echo "<script>window.open('index.php','_self')</script>";

}else{

    include_once('header.php');
    $user_ID=$_SESSION['idUsers'];
    $uql_selects="SELECT * FROM users WHERE idUsers='$user_ID'  LIMIT 1";
    $run_u = mysqli_query($conn,$uql_selects);
      
    while($row_u=mysqli_fetch_array($run_u)){
      $Username = $row_u['Username'];
      $fname = $row_u['FName'];
      $lname = $row_u['LName'];
      $tp = $row_u['TP'];
      $mail = $row_u['email'];
}
}//20210810
?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-user-plus" aria-hidden="true"></i>Edit User Info</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <!--  <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a>Update username & Password</li> -->
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
            <form  method="POST" action="edit_userup.php" enctype="multipart/form-data">
						<div class="form-row" style="margin-top: 20px;">

							<div class="form-group col-md-6">
							<label for="inputEmail4">User name</label>
							<input type="text" class="form-control" name="uname" value="<?php echo $Username; ?> " disabled>
							</div>
              <br>
							<div class="form-group col-md-6">
							<label for="inputPassword4">First Name</label>
							<input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
							</div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">Last Name</label>
              <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
              </div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">Telephone No</label>
              <input type="text" class="form-control" name="tp" value="<?php echo $tp; ?>">
              </div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">Email</label>
              <input type="text" class="form-control" name="mail" value="<?php echo $mail; ?>">
              </div>
              <div class="form-group col-md-12">
                      <input type="submit" class="btn btn-primary form-control" name="update" value="Update User Info">
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
<?php

/*
if(isset($_POST['update'])){

  $uname = $_POST['uname'];
  $pw = $_POST['pw'];



    $update_course = "UPDATE users SET pw='$pw'
    WHERE idUsers='$user_ID' LIMIT 1";
    $run_update=mysqli_query($conn,$update_course);
    if ($run_update) {
      ?>

      <script>
          Swal.fire({
              title: "Success..!",
              text: "Password updated successfully",
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
<?php    }  header('location:home.php'); }}

*/
?>