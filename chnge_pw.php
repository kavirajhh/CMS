<?php 

  // data pass from change_unpw.php
    include('db/conn.php');
    session_start();
    $user_ID=$_SESSION['idUsers'];
    //$uname = $_POST['uname'];
    $pw = $_POST['pw'];

    $sql = "UPDATE users SET pw='$pw' WHERE idUsers='$user_ID' LIMIT 1";
    $run_update=mysqli_query($conn,$sql);
    $conn->close();
    header('location:home.php?msg=Password updated successfully');
    ?>


      <?php  ?>