    
<?php session_start(); ?>


<?php include_once('db/conn.php'); ?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
    
   function currency($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM country where code='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $cname=$row['currency'];
                                }
                                return $cname;

                    }
    $cu=currency($conn,$_SESSION['countrycode']);// get user currency 
        ?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title"><i class="fa fa-plus" aria-hidden="true"></i> Add Program</h2>
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
             <!-- <li class="breadcrumb-item"><a href="home.php" class="breadcrumb-link">Dashboard</a> / Course / Add Course</li> -->
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
							<label for="inputEmail4">Program Name</label>
							<input type="text" class="form-control" name="cname" placeholder="Enter Program Name">
							</div>

							<div class="form-group col-md-6">
							<label for="inputPassword4">Program Fee</label>
							<input type="text" class="form-control" name="cfee" placeholder="<?php echo 'Enter Program Fee ('.$cu.')' ?>">
							</div>


                            <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary form-control" name="csubmit" value="+ Add Program">
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
$country =  $_SESSION['countrycode'];
if (isset($_POST['csubmit'])) {
            $cname=mysqli_real_escape_string($conn, $_POST['cname']);
            $cfee=mysqli_real_escape_string($conn, $_POST['cfee']);
            $cduration=mysqli_real_escape_string($conn, $_POST['cduration']);

        
                $sql="INSERT INTO courses(CName,fee,countrycode,delstatus) VALUES('$cname','$cfee','$country',0)";
                $run_course= mysqli_query($conn, $sql);
                if ($run_course) {
                    ?>
                    <script>
                    
                        Swal.fire({
                            title: "Success..!",
                            text: "Program has been successfully added ",
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