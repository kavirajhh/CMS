<?php
 session_start();
?>


<?php 

include('db/conn.php');
$years = range(2019, strftime("%Y", time()));

$USER_TYPE=$_SESSION['ustatus'];
$monthdef = strftime("%D", time());
$monthdef_rent = strftime("%D", time());
$fDate="";
$lDate="";


 if (!isset($_SESSION['Username'])) {
     echo "<script>window.open('index.php','_self')</script>";
 } 

 else {
     include_once('header.php');

     ?>


<!-- END PROFIT LOST CALCULATORE -->
<head>

</head>


<div class="row">
                    <div class="imgh col-md-6">
                   
                            <!-- <h2><b>Welcome to the learn six sigma <small><b> -->
                            <?php /*
                                    $query1 ="SELECT * FROM userstatus WHERE iduserstatus='$USER_TYPE'";
                                    $ptoduct1 = mysqli_query($conn, $query1);
                                                                 
                                    while ($row_1=mysqli_fetch_array($ptoduct1)) 
                                      {
                                        $U_type = $row_1['type'];
                                                                                                
                                      }
                                    echo $U_type; */
                            ?>   
                            <!--  
                            Panel</b></small></b></h2>
                            <h7 style="margin-top: 9px; margin-bottom: 5px;">User :  <?php echo $_SESSION['FName']; ?></h7>
                            -->
                        <br>
                             
                             <?php 
                              if(isset($_REQUEST['msg'] ) ) {echo $_REQUEST['msg'];} 

                            ?>
                        
                    </div>        
                    <div class="col-md-6 ">
                       

           
                      
</div>




</body>



<?php include_once('footer.php'); 

}
?> 


