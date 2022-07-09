<?php session_start(); ?>


<?php include_once('db/conn.php'); ?>


<?php

if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
} else {
        include_once('header.php');
        $current_userid=$_SESSION['idUsers'];
        $get_country=$_SESSION['countrycode'];
        if (isset($_POST['isubmit'])) {
            $fname=mysqli_real_escape_string($conn, $_POST['fname']);
            $lname=mysqli_real_escape_string($conn, $_POST['lname']);
            $semail=mysqli_real_escape_string($conn, $_POST['semail']);
            $stp=mysqli_real_escape_string($conn, $_POST['stp']);
            $course=mysqli_real_escape_string($conn, $_POST['course']);
            // $snic=mysqli_real_escape_string($conn, $_POST['nic']);
            $discount=mysqli_real_escape_string($conn, $_POST['discount']);
            $org=mysqli_real_escape_string($conn, $_POST['org']);
            $position=mysqli_real_escape_string($conn, $_POST['position']);
            $contactT=mysqli_real_escape_string($conn, $_POST['contactT']);
        
            if (empty($fname)) {
                array_push($error, "<br>frist name is required");
            }
            if (empty($course)) {
                array_push($error, "<br>Course is required");
            }
            if (empty($semail)) {
                array_push($error, "<br>email is required");
            }
            if (empty($stp)) {
                array_push($error, "<br>Telephone Number is required");
            }

            $sql_select="SELECT * FROM student_registration LIMIT 1";
            $result=mysqli_query($conn, $sql_select);
            $user=mysqli_fetch_array($result);

            

            if (count($error)==0) {
               
                $sql="INSERT INTO student_registration(FName,LName,Country,Tp,Email,organizaton,position,contact_through,Courseid,discount,SenderId,date,qStatus) VALUES('$fname','$lname','$get_country','$stp','$semail','$org','$position','$contactT','$course','$discount','$current_userid',NOW(),1)";
                $run_Rproduct= mysqli_query($conn, $sql);

                 if($run_Rproduct){
                
                    
                
                }
            }
        }

        // send invoice

        if (isset($_POST['qsubmit'])) {
            $fname=mysqli_real_escape_string($conn, $_POST['fname']);
            $lname=mysqli_real_escape_string($conn, $_POST['lname']);
            $semail=mysqli_real_escape_string($conn, $_POST['semail']);
            $stp=mysqli_real_escape_string($conn, $_POST['stp']);
            $course=mysqli_real_escape_string($conn, $_POST['course']);
            // $snic=mysqli_real_escape_string($conn, $_POST['nic']);
            $discount=mysqli_real_escape_string($conn, $_POST['discount']);
            $org=mysqli_real_escape_string($conn, $_POST['org']);
            $position=mysqli_real_escape_string($conn, $_POST['position']);
            $contactT=mysqli_real_escape_string($conn, $_POST['contactT']);
        
        
            if (empty($fname)) {
                array_push($error, "<br>frist name is required");
            }
            if (empty($course)) {
                array_push($error, "<br>Course is required");
            }
            if (empty($semail)) {
                array_push($error, "<br>email is required");
            }
            if (empty($stp)) {
                array_push($error, "<br>Telephone Number is required");
            }

            $sql_select="SELECT * FROM student_registration LIMIT 1";
            $result=mysqli_query($conn, $sql_select);
            $user=mysqli_fetch_array($result);

           
           

            if (count($error)==0) {
                $get_country=$_SESSION['countrycode'];
                $sql="INSERT INTO student_registration(FName,LName,Country,Tp,Email,organizaton,position,contact_through,Courseid,discount,SenderId,date,qStatus) VALUES('$fname','$lname','$get_country','$stp','$semail','$org','$position','$contactT','$course','$discount','$current_userid',NOW(),0)";
                $run_Rproduct= mysqli_query($conn, $sql);

                 if($run_Rproduct){
                    $sql_selectcourse="SELECT * FROM courses WHERE idCourse='$course' LIMIT 1";
                    $user_selectcourse=mysqli_query($conn, $sql_selectcourse);
                   

                    while ($row_selectcourse=mysqli_fetch_array($user_selectcourse)) {
                        $Course_fee = $row_selectcourse['fee'];
                        $countrycode = $row_selectcourse['countrycode'];
                    }

                    $sub_total=($Course_fee*$discount)/100;
                    $sub=$Course_fee-$sub_total;

                    $name = $fname;
                    $mailFrom = $semail;
                    $message = '
                    <h3 align="center">Applicant Details</h3>
                    <table border="1" width="100%" cellpadding="5" cellspacing="5">
                        
                        <tr>
                            <td width="30%">Description</td>
                            <td width="30%">Per Participant Rate</td>
                            <td width="30%">Discount</td>
                            <td width="30%">Amount</td>
                            
                        </tr>
                        <tr>
                            <td width="70%">' . $_POST["course"] . '</td>
                            <td width="70%">' . $Course_fee . '</td>
                            <td width="70%">' . $_POST["discount"] . '</td>
                            <td width="70%">' . $sub . '</td>
                        </tr>
                        <tr>
                            
                            
                        </tr>
                        
                       
                    </table>
                ';
                    $mailTo = $semail;

                    $headers = "From: ".$mailFrom;
                    $txt = "You have received an e-mail from".$name.".\n\n".$message;
                    mail($mailTo, $message, $txt, $headers);
                    
                
                }
            }
        }
        ?>
<style>
label{
    color: #222222;
}
</style>    

<div class="tile mb-4">
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php  include_once('db/error.php');  ?>
            <div class="panel-body">
            <!-- ------------------------------ -->
            <!-- <div class="tab" >
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item " style="margin-right: 2px;">
                <a  class="nav-link active " data-toggle="tab" href="#mainForm" role="tab" aria-selected="true">   Invoice  </a>
            </li>
            <li class="nav-item"  style="margin-right: 2px;">
                <a  class="nav-link" data-toggle="tab" href="#mainForm2" role="tab" aria-selected="false">   Quotation   </a>
            </li>
            </ul> -->
            <!-- ------------------------------ -->
                <div class="tab-content" id="myTabContent">
         
                   

                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        
                        <h2 class="pageheader-title tcolor"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Quotation</h2>
                        <div class="page-breadcrumb">
                    
                        </div>
                    </div>
                </div>
                </div>
                    <form  method="POST"  enctype="multipart/form-data" >
						<div class="form-row" style="margin-top: 20px;">

                        <div class="form-group col-md-6">
							<label class="tcolor" for="inputEmail4">Frist Name</label>
							<input type="text" class="form-control" name="fname" placeholder="Enter Frist Name" required data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-trigger="keyup"/>
							</div>
							

							<div class="form-group col-md-6">
							<label  class="tcolor" for="inputPassword4">Last Name</label>
							<input type="text" class="form-control" name="lname" placeholder="Enter Last Name">
							</div>
					
							<div class="form-group col-md-4">
							<label  class="tcolor" for="inputEmail4">Email</label>
							<input type="email" class="form-control" name="semail" placeholder="samplemail@gmail.com">
							</div>

							<div class="form-group col-md-4">
							<label  class="tcolor" for="inputPassword4">Telephone Number</label>
							<input type="number" class="form-control" name="stp" placeholder="Enter Telephone" required data-parsley-pattern="^[0-9]+$" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-trigger="keyup"/>
							</div>

                            <div class="form-group col-md-4">
							<label  class="tcolor" for="inputEmail4">Organization</label>
							<input type="text" class="form-control" name="org" placeholder="Abc company">
							</div>

                            <div class="form-group col-md-4">
							<label  class="tcolor" for="inputEmail4">Position</label>
							<input type="text" class="form-control" name="position" placeholder="ceo / manager / ect..">
							</div>

                          

							<div class="form-group col-md-4">
							<label  class="tcolor" >Select Cource</label>
								<select name="course" id="course" class="sl2 form-control" require>
								<option selected disabled> Select a Course</option>
								<?php
                              
                                $get_course = "select * from courses";
                                $run_course = mysqli_query($conn, $get_course);
                                                    
                                while ($row_course=mysqli_fetch_array($run_course)) {
                                    $idCourse = $row_course['idCourse'];
                                    $CName = $row_course['CName'];
                                    $fee = $row_course['fee'];
                                                        
                                    echo "<option value='$idCourse'> $CName   </option>";
                                }?>
								</select>
							</div>

                            <div class="form-group col-md-4">
							<label  class="tcolor" for="inputPassword4">Discount</label>
							<input type="number" class="form-control" name="discount" id="discount" placeholder="%" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;">
							</div>

                            <div class="form-group col-md-4">
							<label  class="tcolor" >Contacted through</label>
								<select name="contactT" id="contactT" class="sl2 form-control" require>
		 
                                    <option value='Facebook'>Facebook</option>
                                    <option value='LinkedIn'>LinkedIn</option>
                                    <option value='Instagram'>Instagram</option>
                                    <option value='Linkdin'>Linkdin</option>
                                    <option value='Newspaper Advertisment'>Newspaper Advertisment</option>
                                    <option value='friend'>friend</option>
                                    <option value='other'>other</option>
                                
								</select>
							</div>
                            <div class="form-group col-md-12">
                                    <input type="submit" class="btn btn-primary form-control" name="qsubmit" value="send" >
                            </div>
						</div>
					</form>
				    </div>
				    </div>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>


<?php include_once('footer.php') ?>
<script src="js/jquery.steps.js"></script>
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
 }?>