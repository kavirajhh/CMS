
<?php session_start();  
include('db/conn.php'); 
if (!isset($_SESSION['Username'])) 
  {
  echo "<script>window.open('index.php','_self')</script>";

  }
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

$sql = "SELECT * FROM footer WHERE con_id='$con_id' limit 1 ";
$rs = mysqli_query($conn, $sql);
if ($rs->num_rows > 0){
            while ($row=mysqli_fetch_array($rs)) 
            { 
                $status=1;                           
                $con_id = $row['con_id'];
                $f_name = $row['f_name'];
                $f_reg_no = $row['f_reg_no'];
                $f_add_no = $row['f_add_no'];
                $f_add_street = $row['f_add_street'];
                $f_add_city = $row['f_add_city'];
                $f_tp_land = $row['f_tp_land'];
                $f_tp_mo = $row['f_tp_mo'];
                $f_mail = $row['f_mail'];
                $f_web = $row['f_web'];
                $i++; 
             
                      }
            }
else{
                $status=0;
                $con_id =$con_id;
                $f_name = '';
                $f_reg_no = '';
                $f_add_no = '';
                $f_add_street = '';
                $f_add_city = '';
                $f_tp_land ='';
                $f_tp_mo = '';
                $f_mail = '';
                $f_web = '';
}


    include_once('header.php');
    /*$user_ID=$_SESSION['idUsers'];
   // $con_id=country_by_user($conn,$_SESSION['idUsers']);
   // $uql_selects="SELECT * FROM users WHERE countrycode='$con_id'";
    //$run_u = mysqli_query($conn,$uql_selects);
      
   // while($row_u=mysqli_fetch_array($run_u))
    //  {
    //      $bank = $row_u['bank'];
          $branch = $row_u['branch'];
          $bankAccountNumber = $row_u['bankAccountNumber'];
          $accname = $row_u['accname'];

      }*/

?>

<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

</div>
<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php  include_once('db/error.php');  ?>
            <div class="panel-body">


            <div>
            <form  method="POST" action='inv_footer_up.php' enctype="multipart/form-data">
						<div class="form-row" style="margin-top: 20px;">

							<input type="hidden" name="status" value=<?php echo $status ?>>
              <input type="hidden" name="con_id" value=<?php echo $con_id ?>>
							<div class="form-group col-md-12">
							<label for="inputPassword4">Invoice Footer</label>
               <textarea  class="form-control" name="f_name"  rows="6" cols="50" id="addtext" onkeypress="myFunction()"><?php echo $f_name; ?>
              </textarea>
              </div>

            
<script>
function myFunction() {
  document.getElementById("viewtext").style.backgroundColor = "#ffa1a1";
  var x = document.getElementById("addtext");
  var y= document.getElementById("viewtext");
  y.value = x.value;
}
</script>
              <!--   20210902
               <label for="inputPassword4">Company Name</label>
							<input type="text" class="form-control" name="f_name" maxlength="45" value="<?php echo $f_name; ?>">
							</div>

              <div class="form-group col-md-6">
							<label for="inputPassword4">Registration No</label>
							<input type="text" class="form-control" name="f_reg_no" maxlength="20" value="<?php echo $f_reg_no; ?>">
							</div>

              <div class="form-group col-md-6">
              <label for="inputPassword4">Address No</label>
              <input type="text" class="form-control" name="f_add_no" maxlength="20" value="<?php echo $f_add_no ; ?>">
              </div>
              <div class="form-group col-md-6">
              <label for="inputPassword4">Address Street</label>
              <input type="text" class="form-control" name="f_add_street" maxlength="20" value="<?php echo $f_add_street ; ?>">
              </div>
               <div class="form-group col-md-6">
              <label for="inputPassword4">Address City</label>
              <input type="text" class="form-control" name="f_add_city" maxlength="20" value="<?php echo $f_add_city ; ?>">
              </div>
              <div class="form-group col-md-6"></div>
              <div class="form-group col-md-6">
              <label for="inputPassword4">Telephone 01</label>
              <input type="text" class="form-control" name="f_tp1" maxlength="14" value="<?php echo $f_tp_land ; ?>">
              </div>
              <div class="form-group col-md-6">
              <label for="inputPassword4">Telephone 02</label>
              <input type="text" class="form-control" name="f_tp2" maxlength="14" value="<?php echo $f_tp_mo ; ?>">
              </div>
              <div class="form-group col-md-6">
              <label for="inputPassword4">Email</label>
              <input type="email" class="form-control" name="f_mail" maxlength="40" value="<?php echo $f_mail ; ?>">
              </div>
              <div class="form-group col-md-6">
              <label for="inputPassword4">Web URL</label>
              <input type="text" class="form-control" name="f_web" maxlength="40" value="<?php echo $f_web ; ?>">
              </div>

          20210902  -->
              <div class="form-group col-md-12">
              <input type="submit" class="btn btn-primary form-control" name="update" value="Update Footer">
              </div>

              <div class="form-group col-md-12">
              <label for="inputPassword4">View your Footer</label>
               <textarea  class="form-control" name="#"  rows="6" cols="50" disabled="" id="viewtext"><?php echo $f_name; ?>
              </textarea>
              </div>
            </div>
						</div>
					</form>

            
                    
			    </div>
			</div>
		</div>
	</div>
</div>



<?php include_once('footer.php') ?>
<script src="js/parsley.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
