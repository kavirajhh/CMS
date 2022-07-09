<?php 

  // data pass from change_unpw.php
    include('db/conn.php');
    session_start();
    $user_ID=$_SESSION['idUsers'];
    //$uname = $_POST['uname'];
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cfee = $_POST['cfee'];
    $cduration = $_POST['cduration'];


    $update_course = "UPDATE courses SET CName='$cname',fee='$cfee'WHERE idCourse='$cid' LIMIT 1";
    $run_update=mysqli_query($conn,$update_course);
    $conn->close();
    header('location:home.php?msg=Program has been successfully updated');
    ?>


      <?php  ?>