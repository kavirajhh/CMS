<?php 

  // data pass from change_unpw.php
    include('db/conn.php');
    session_start();
    $user_ID=$_SESSION['idUsers'];
    //$uname = $_POST['uname'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tp = $_POST['tp'];
    $mail = $_POST['mail'];
    $sql = "UPDATE users SET FName='$fname',LName='$lname',TP='$tp',email='$mail' WHERE idUsers='$user_ID' LIMIT 1";
    $run_update=mysqli_query($conn,$sql);
    $conn->close();
    header('location:home.php?msg=User information updated successfully');
    ?>


      