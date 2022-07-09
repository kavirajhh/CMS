<?php 
if (!isset($_SESSION['Username'])) 
  {
  echo "<script>window.open('index.php','_self')</script>";

  }
  // data pass from inv_footer.php
    include('db/conn.php');
    session_start();
                $status=$_POST['status'];
                $con_id =$_POST['con_id'];
                $f_name = $_POST['f_name'];
             /*   $f_reg_no = $_POST['f_reg_no'];
                $f_add_no = $_POST['f_add_no'];
                $f_add_street = $_POST['f_add_street'];
                $f_add_city = $_POST['f_add_city'];
                $f_tp_land =$_POST['f_tp1'];
                $f_tp_mo = $_POST['f_tp2'];
                $f_mail = $_POST['f_mail'];
                $f_web = $_POST['f_web'];
 20210902   */
    if($status==1){
        $sql = "UPDATE footer SET f_name='$f_name' WHERE con_id='$con_id' ";

  /* 20210902
        $sql = "UPDATE footer SET f_name='$f_name',f_reg_no='$f_reg_no',f_add_no ='$f_add_no',f_add_street='$f_add_street',f_add_city='$f_add_city',f_tp_land='$f_tp_land',f_tp_mo='$f_tp_mo',f_mail='$f_mail',f_web ='$f_web '
            WHERE con_id='$con_id' ";
 */   
    }
    else if($status==0){
       $sql ="insert into footer  (`con_id`, `f_name`) VALUES ('".$con_id."','".$f_name."')";

       /* 20210902
        $sql ="insert into footer  (`con_id`, `f_name`, `f_reg_no`, `f_add_no`, `f_add_street`, `f_add_city`, `f_tp_land`, `f_tp_mo`, `f_mail`, `f_web`) VALUES ('".$con_id."','".$f_name."','".$f_reg_no."','".$f_add_no."','".$f_add_street."','".$f_add_city."','".$f_tp_land."','".$f_tp_mo."','".$f_mail."','".$f_web."')";
        */
    }
    $run_update=mysqli_query($conn,$sql);
    $conn->close();
    header('location:home.php?msg=Footer details updated successfully');
    ?>
