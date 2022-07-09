
<?php session_start(); ?>

<?php include('db/conn.php'); 
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

if (!isset($_SESSION['Username'])) 
  {
	echo "<script>window.open('index.php','_self')</script>";

  }
else{

    include_once('header.php');
    $user_ID=$_SESSION['idUsers'];
    $con_id=country_by_user($conn,$_SESSION['idUsers']);
    $uql_selects="SELECT * FROM users WHERE countrycode='$con_id'";
    $run_u = mysqli_query($conn,$uql_selects);
      
    while($row_u=mysqli_fetch_array($run_u))
      {
          $bank = $row_u['bank'];
          $branch = $row_u['branch'];
          $bankAccountNumber = $row_u['bankAccountNumber'];
          $accname = $row_u['accname'];
          $ifsc = $row_u['ifsc'];
          $swift = $row_u['swift'];
      }

?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <!--  <div class="page-header">
         <h2 class="pageheader-title"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Bank Details</h2> 
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a>Update Bank Details</li> 
            </ol>
          </nav>
        </div>
    </div>
  </div>-->
</div>
<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php  include_once('db/error.php');  ?>
            <div class="panel-body">


            <div>
            <form  method="POST" action='update_bankdetailup.php' enctype="multipart/form-data">
						<div class="form-row" style="margin-top: 20px;">

							<div class="form-group col-md-6">
							<label for="inputEmail4">Bank Name</label>
							<input type="text" class="form-control" name="bname" value="<?php echo $bank; ?>">
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Branch</label>
							<input type="text" class="form-control" name="branch" value="<?php echo $branch; ?>">
							</div>

              <div class="form-group col-md-6">
							<label for="inputPassword4">Account Number</label>
							<input type="text" class="form-control" name="anumber" value="<?php echo $bankAccountNumber; ?>">
							</div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">Account Name</label>
              <input type="text" class="form-control" name="accname" value="<?php echo $accname; ?>">
              </div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">IFSC</label>
              <input type="text" class="form-control" maxlength="15" name="ifsc" value="<?php echo $ifsc; ?>">
              </div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">SWIFT CODE</label>
              <input type="text" class="form-control" maxlength="15" name="swift" value="<?php echo $swift; ?>">
              </div>

              <input type="hidden" class="form-control" name="cid" value="<?php echo $con_id; ?>">
                            <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary form-control" name="update" value="Update bank details">
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
/*if(isset($_POST['update'])){

  $bname = $_POST['bname'];
  $branch = $_POST['branch'];
  $anumber = $_POST['anumber'];
  $accname = $_POST['accname'];


    $update_course = "UPDATE users SET bank='$bname',branch='$branch',bankAccountNumber='$anumber',accname='$accname'
    WHERE idUsers='$user_ID' LIMIT 1";
    $run_update=mysqli_query($conn,$update_course);
    if ($run_update) {
      ?>

      <script>
          Swal.fire({
              title: "Success..!",
              text: "Bank Details Updated Successfully",
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
<?php    }  header('location:manage_courses.php'); }}

*/ 
}
?>