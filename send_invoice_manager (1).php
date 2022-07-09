<?php 

session_start(); 
include_once('db/conn.php');
//include "hzdef/hzUF.php"; 
date_default_timezone_set("Asia/Colombo");  
$date=date("yy/m/d");
$invdate=date("ym");
 ?>


<?php

if (!isset($_SESSION['Username'])) {
            echo "<script>window.open('index.php','_self')</script>";
        } 
else {
        include_once('header.php');
        $current_userid=$_SESSION['idUsers'];
        $get_country=$_SESSION['countrycode'];

        // send invoice

        if (isset($_POST['qsubmit'])) 
            {
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

         
                $sql_selectcourse="SELECT * FROM courses WHERE idCourse='$course' LIMIT 1";
                $user_selectcourse=mysqli_query($conn, $sql_selectcourse);
               
                while ($row_selectcourse=mysqli_fetch_array($user_selectcourse)) {
                    $Course_fee = $row_selectcourse['fee'];
                    $countrycode = $row_selectcourse['countrycode'];
                }

            if (count($error)==0)
                 {
                    $get_country=$_SESSION['countrycode'];
                    $sql="INSERT INTO student_registration(FName,LName,Country,Tp,Email,organizaton,position,contact_through,Courseid,CourseFee,discount,SenderId,date) VALUES('$fname','$lname','$get_country','$stp','$semail','$org','$position','$contactT','$course','$Course_fee','$discount','$current_userid',NOW())";
                    $run_Rproduct= mysqli_query($conn, $sql);
                    $last_id = $conn->insert_id;

                    $invoiceno=$get_country.$invdate.$last_id;
                    $update_invno = "UPDATE student_registration SET invoiceno='$invoiceno'  WHERE idstudent='$last_id' LIMIT 1";
                    $run_update=mysqli_query($conn,$update_invno);

                 if($run_Rproduct)
                    {
                        $sql_selectcourse="SELECT * FROM courses WHERE idCourse='$course' LIMIT 1";
                        $user_selectcourse=mysqli_query($conn, $sql_selectcourse);
                    

                    while ($row_selectcourse=mysqli_fetch_array($user_selectcourse)) 
                        {
                            $Course_fee = $row_selectcourse['fee'];
                            $countrycode = $row_selectcourse['countrycode'];
                        }// end of while

                    function coursename($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM courses where idCourse='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $cname=$row['CName'];
                                }
                                return $cname;

                    }


                    function usermail($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $umail=$row['email'];
                                }
                                return $umail;

                    }

                    function bank_acc_no($conn,$id)
                    {
                    $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $id=$row['bankAccountNumber'];
                                }
                                return $id;

                    }

                    function bank_acc_branch($conn,$id)
                    {
                    $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $id=$row['branch'];
                                }
                                return $id;

                    }

                    function bank_acc_bank($conn,$id)
                    {
                    $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $id=$row['bank'];
                                }
                                return $id;

                    }

                     function bank_acc_name($conn,$id)
                    {
                    $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $id=$row['accname'];
                                }
                                return $id;

                    }

                    function user_name($conn,$id)
                    {
                    $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $id1=$row['FName'];
                                $id2=$row['LName'];
                                $id=$id1.' '.$id2;
                                }
                                return $id;

                    }

                    function user_contact($conn,$id)
                    {
                    $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $id=$row['TP'];
                                //$id2=$row['email'];
                               // $id="Telephone:$id1 Email : $id2"
                                }
                                return $id;

                    }
                        // add

                        $mailTo = usermail($conn,$_SESSION['Username']);
                        $accno=bank_acc_no($conn,$_SESSION['Username']);
                        $branch=bank_acc_branch($conn,$_SESSION['Username']);
                        $bank=bank_acc_bank($conn,$_SESSION['Username']);
                        $accname=bank_acc_name($conn,$_SESSION['Username']);
                        $sender=user_name($conn,$_SESSION['Username']);
                        $sendercont=user_contact($conn,$_SESSION['Username']);
                        $cname=coursename($conn,$_POST["course"]);

                        if (!is_numeric($discount) or $discount==0) 
                            {
                                $sub_total=0;
                            } 
                        else {
                                $sub_total=($Course_fee*$discount)/100;

                            }
                        $sub=$Course_fee-$sub_total;

                        $name = $fname;
                        $mailFrom = $semail;
                        $message = '<html>
                                    <head>
                                    <title>Invoice</title>
                                    </head>
                                    <body>
                                    
          
                                    <table width=80% align=center>
                                    <tr bgcolor=#808080 ><td colspan=4><h1 align="center" ><br>Invoice<br></h1></td></tr>
                                    <tr bgcolor=#808080 ><td colspan=4 align=right>
                                    <br><b>Invoice No :</b>'.$invoiceno.'<br><b>Date :</b>'.$date.'<br></td></tr>
                                    <tr><td colspan=3><b> Student Name : '.$fname.' '.$lname.'<b>
                                    <br>Designation : '.$position.'<br> Organization : '.$org.'</td><td></td></tr>
                                    

                                    <tr bgcolor=#fecf6a height=50 align=center >
                                    <td width="40%">Description</td>
                                    <td width="20%">Per Participant Rate</td>
                                    <td width="20%">Discount</td>
                                    <td width="20%">Amount</td>
                                    </tr>
                                    <tr bgcolor=#EEEEEE >
                                    <td align=left>' .$cname. '</td>
                                    <td align=right>' . $Course_fee . '</td>
                                    <td align=right>' .$sub_total . '</td>
                                    <td align=right>' . $sub . '</td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    
                                    <tr><td colspan=4><br><h3>Payment Instructions</h3>
                                    Please deposit to below bank account:<br><br></td></tr>
                                    
                                    <tr bgcolor=#EEEEEE  height=50 align=center >
                                    <td >Account Name </td>
                                    <td >Account Number </td>
                                    <td >Bank</td>
                                    <td >Branch </td>
                                    </tr>


                                    <tr bgcolor=#EEEEEE align=center>
                                    <td width="25%">' .$accname. '</td>
                                    <td width="25%">' . $accno . '</td>
                                    <td width="25%">' .$bank . '</td>
                                    <td width="25%">' . $branch . '</td>
                                    </tr>
                                   
                                    <tr>
                                    </tr>
                                    <tr><td colspan=4>Best Regards<br><br><b>'.$sender.'</b><br>
                                    The Lean Six Sigma Company<br>'.$sendercont.'<br></td></tr>
                                    <tr><td colspan=4><h5>(This is a computer generated invoice and no signature required)</h5>
                                    </td></tr>
                                    </table>

                                    </body>
                                    </html>';

                        //
                        //$mailTo = $semail;
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= "From:".$mailTo."";
                        $txt = " Invoice";
                        mail($mailFrom, $txt, $message, $headers);
                        
                         

                        } // enf of if($run_Rproduct)
                        echo '<div class="alert alert-success">Invoice Sended Successfully</div>';
                    } // end of if (count($error)==0)
                } // end of if (isset($_POST['qsubmit'])) 
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
                <div class="tab-content" id="myTabContent">
                <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        
                        <h2 class="pageheader-title tcolor"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Invoice</h2>
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
                    
                            <div class="form-group col-md-6">
                            <label  class="tcolor" for="inputEmail4">Email</label>
                            <input type="email" class="form-control" name="semail" placeholder="samplemail@gmail.com">
                            </div>

                            <div class="form-group col-md-6">
                            <label  class="tcolor" for="inputPassword4">Telephone Number</label>
                            <input type="number" class="form-control" name="stp" placeholder="Enter Telephone" required data-parsley-pattern="^[0-9]+$" data-parsley-minlength="10" data-parsley-maxlength="10" data-parsley-trigger="keyup"/>
                            </div>

                            <div class="form-group col-md-6">
                            <label  class="tcolor" for="inputEmail4">Organization</label>
                            <input type="text" class="form-control" name="org" placeholder="Abc company">
                            </div>

                            <div class="form-group col-md-6">
                            <label  class="tcolor" for="inputEmail4">Position</label>
                            <input type="text" class="form-control" name="position" placeholder="ceo / manager / ect..">
                            </div>

                            <div class="form-group col-md-6">
                            <label  class="tcolor" >Select Cource</label>
                                <select name="course" id="course" class="sl2 form-control" require>
                                <option selected disabled> Select a Course</option>
                                <?php
                              
                                    $get_sessioncount= $_SESSION['countrycode'];
                                    $get_course = "select * from courses where countrycode='$get_sessioncount' and delstatus=0";
                                    // 0801 $get_course = "select * from courses";
                                    $run_course = mysqli_query($conn, $get_course);
                                                    
                                    while ($row_course=mysqli_fetch_array($run_course)) {
                                        $idCourse = $row_course['idCourse'];
                                        $CName = $row_course['CName'];
                                        $fee = $row_course['fee'];
                                                        
                                        echo "<option value='$idCourse'> $CName   </option>";
                                }?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                            <label  class="tcolor" for="inputPassword4">Discount</label>
                            <input type="number" class="form-control" name="discount" id="discount" placeholder="%" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;">
                            </div>

                            <div class="form-group col-md-6">
                            <label  class="tcolor" >Contacted through</label>
                                <select name="contactT" id="contactT" class="sl2 form-control" require>
         
                                <option value='Internet'>Internet </option>
                                <option value='LinkedIn'>LinkedIn</option>
                                <option value='Facebook'>Facebook</option>
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