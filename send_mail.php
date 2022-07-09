
<?php session_start(); ?>

<?php include('db/conn.php'); ?>
<?php 
if (!isset($_SESSION['Username'])) {
	echo "<script>window.open('index.php','_self')</script>";

}else{

    include_once('header.php');

    if (isset($_GET['sendMail'])) {

        $sendMail=mysqli_real_escape_string($conn,($_GET['sendMail']));
        $uql_selects="SELECT * FROM student_registration WHERE idStudent='$sendMail'  LIMIT 1";
        $run_u = mysqli_query($conn,$uql_selects);
      
    while($row_u=mysqli_fetch_array($run_u)){
      $idStudent = $row_u['idStudent'];
      $email = $row_u['Email'];
      $Courseid = $row_u['Courseid'];
      $FName = $row_u['FName'];
      $discount = $row_u['discount'];

}
$get_c = "SELECT * FROM courses WHERE idCourse='$Courseid'";
$run_c = mysqli_query($conn, $get_c);
                                                    
while ($row_c=mysqli_fetch_array($run_c)) {
        $CName = $row_c['CName'];
        $fee = $row_c['fee'];
    } 
}

         
//         
//         // $load_data = "UPDATE purches_cash_item SET del_status=1 WHERE purches_cash_item_id='$mail_id'";
//         $load_data = "SELECT * FROM student_registration WHERE idStudent='$mail_id'";
//         $sql = mysqli_query($conn, $load_data);

//         while ($sql_1=mysqli_fetch_array($sql))
//         {
//             $idStudent = $sql_1['idStudent'];
//             $FName = $sql_1['FName'];
//             $Country = $sql_1['Country'];
//             $Email = $sql_1['Email'];
//             $Courseid = $sql_1['Courseid'];
//         }

//         $mailTo = "keshanharsha1999@gmail.com";
//         $headers = "From: ".$Email;
//         $txt = "You have received an e-nail from".$FName.".\n\n".$Country;
//         mail($mailTo, $Country, $txt, $headers);
//         header("location:manage_students.php?mailsend");

// }else{
// 	echo "<script>window.open('home.php','_self')</script>";
// }
?>


<div class="tile col-md-6 center">
        <div class="panel panel-default" style="background-color: #4747AA; color: #fff;padding: 10px 10px 10px 10px; margin-bottom:10px;">
        compose email
        </div>
            <?php include_once('db/error.php'); ?>
            <div class="panel-body">
                <div>
                <form  method="POST" enctype="multipart/form-data">

						<div class="form-row">
							<div class="form-group col-md-12">
							    <input type="text" class="form-control" name="cname" value="<?php echo $email; ?>">
							</div>
						</div>

                        <div class="form-row">
							<div class="form-group col-md-12">
							    <input type="text" class="form-control" name="cfee"  value="INVOICE FOR <?php echo  $CName;?>">
							</div>
						</div>

                        <div class="form-row">
							<div class="form-group col-md-12">
							    <input type="textarea" class="form-control"  value="<?php ?>">
                                <!-- <table>
                                    <thead>
                                        <tr>
                                
                                            <th>Student ID </th>
                                            <th>Frist name: </th>
                                            <th>Telephone</th>
                                            <th>email: </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                    
                                            <td>Student ID </td>
                                            <td>Frist name: </td>
                                            <td>Telephone</td>
                                            <td>email: </td>

                                        </tr>
                                    </tbody>
                                </table> -->
                               
							</div>
						</div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                    <input type="submit" class="btn btn-primary form-control" name="csubmit" value="Send">
                            </div>
						</div>
                        
            
					</form>
				    </div>
                    
			    </div>
			</div>
	

</div>


<?php include_once('footer.php') ?>
<script src="js/parsley.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<?php
}?>