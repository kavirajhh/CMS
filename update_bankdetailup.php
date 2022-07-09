<?php 

  // data pass from change_unpw.php
    include('db/conn.php');
    session_start();
    $user_ID=$_SESSION['idUsers'];
    $bname = $_POST['bname'];
    $branch = $_POST['branch'];
    $anumber = $_POST['anumber'];
    $accname = $_POST['accname'];
    $ifsc = $_POST['ifsc'];
    $swift = $_POST['swift'];
    $cid = $_POST['cid'];

    $update_course = "UPDATE users SET bank='$bname',branch='$branch',bankAccountNumber='$anumber',accname='$accname',ifsc='$ifsc',swift='$swift '
    WHERE countrycode='$cid' ";
    $run_update=mysqli_query($conn,$update_course);
    $conn->close();
    header('location:home.php?msg=Bank details updated successfully');
    ?>


      <?php  ?>