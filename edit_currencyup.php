<?php 

  // data pass from change_unpw.php
    include('db/conn.php');
    session_start();
    if (!isset($_SESSION['Username'])) {
    echo "<script>window.open('index.php','_self')</script>";
    }

    $cid = $_POST['cid'];
    $crate = $_POST['crate'];
    $share_d = $_POST['share'];

    $update_rate = "UPDATE country SET currency_rate='$crate' WHERE code='$cid' LIMIT 1";
    $run_update=mysqli_query($conn,$update_rate);

    $update_share = "UPDATE share SET share='$share_d' WHERE countrycode='$cid' LIMIT 1";
    $run_share=mysqli_query($conn,$update_share);

    header('location: countries.php');

    $conn->close();
    header('location:home.php?msg=Currency rate updated successfully');
    ?>


      <?php  ?>