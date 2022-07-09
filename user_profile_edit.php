<?php 

session_start();
?>

<?php 

include('db/conn.php');

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
 include_once('header.php');

	if (isset($_POST['edit'])) {

		$uid=$_SESSION['user_id'];

		$my_name1 = $_POST['name'];
	    $mn = $_POST['mn'];
	    $address = $_POST['address'];

	    $product_img1 = $_FILES['product_img1']['name'];
	    $temp_name1 = $_FILES['product_img1']['tmp_name'];
	    move_uploaded_file($temp_name1,"user_image/$product_img1");

	    if (!empty($product_img1)) {
	    	$sql="UPDATE users SET name='$my_name1', address='$address',  mn='$mn', user_image='$product_img1' WHERE users_id='$uid' LIMIT 1";

	    }else{
	    	$sql="UPDATE users SET name='$my_name1',  address='$address', mn='$mn' WHERE users_id='$uid' LIMIT 1";
	    }

	    $a=mysqli_query($conn,$sql);

	    if ($a) {
	    	?>
	    		<script >
	    		alert("Edit Successfully..Log Out Now..Please Log in");
	    		window.open('log_out.php?','_self');
	    	</script>

	    	<?php
	    }else{
	    	?>
	    		<script >alert("Error");</script>
	    	<?php
	    }
        
	}


 ?>

<div class="tile mb-4">
   <div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / My Profile / Edit My Profile
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->


<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  My Profile
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            <?php include_once('db/error.php'); ?>
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
            <form id="mainForm" method="post" style="margin: 10px;" enctype="multipart/form-data">

					  <div class="form-group">
					    <label for="formGroupExampleInput">My Name</label>
						<div class="col-md-6"><!-- col-md-6 Begin -->
					    <input type="text" class="form-control" placeholder="My Name" name="name" value="<?php echo $_SESSION['my_name'];?>" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
					  </div></div>

					  <div class="form-group">
					    <label for="formGroupExampleInput2">Mobile No</label>
						<div class="col-md-6"><!-- col-md-6 Begin -->
					    <input type="text" class="form-control"  placeholder="Mobile No" name="mn" required value="<?php echo $_SESSION['mn'];?>" required data-parsley-pattern="^[0-9]+$" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-trigger="keyup"/>
					  </div></div>

					  <div class="form-group">
					    <label for="formGroupExampleInput2">Address</label>
						<div class="col-md-6"><!-- col-md-6 Begin -->
					    <input type="text" class="form-control"   placeholder="My Address" name="address" value="<?php echo $_SESSION['address'];?>" required data-parsley-trigger="keyup"/>
					  </div></div>

					  <div class="form-group"><!-- form-group Begin -->
                      <label class="col-md-3 control-label">My Image </label> 
                      <div class="col-md-6"><!-- col-md-6 Begin -->
                          <input name="product_img1" type="file"  class="form-control" value="<?php echo $_SESSION['user_img'];?>">
                          <img width="70" height="70" src="user_image/<?php echo $_SESSION['user_img'];?>">

                      </div><!-- col-md-6 Finish -->
                   </div><!-- form-group Finish -->

					  <div class="form-group">
					  <div class="col-md-6"><!-- col-md-6 Begin -->
				        <input type="submit" class="btn btn-primary form-control" id="edit" name="edit" value="Edit My Profile" onclick="return confirm('Do Yo Want To Update..')">
				      </div></div>
					</form>
				</div>
</div>
</div>
</div>
</div>
</div>

<?php include_once('footer.php') ?>
<script src="js/parsley.js"></script>
<!--MainForm VALIDATE SCRIPT -->
	<script>
		$(document).ready(function(){  
		$('#mainForm').parsley();
	});  
	</script>
<!--/MainForm VALIDATE SCRIPT -->
<?php } ?>