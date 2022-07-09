
<?php session_start(); ?>

<?php include_once('db/conn.php'); ?>
<?php include_once('header.php'); include_once('footer.php') ?>
<script src="js/parsley.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<?php 
if (!isset($_SESSION['Username'])) {
	echo "<script>window.open('index.php','_self')</script>";
}else{

if (isset($_GET['delete_student'])) {
		$id=mysqli_real_escape_string($conn,($_GET['delete_student']));

			// header("location:admin_management.php?error=con_not_delete_curent_user");
			$sql="UPDATE student_registration SET delstatus=1 WHERE  idStudent='$id'";
			$result=mysqli_query($conn,$sql);
            
            if ($result) { ?>
                <script>
                        Swal.fire({
                            title: "Success..!",
                            text: "Student has been successfully Deleted ",
                            icon: "success",
                            button: "Aww yiss!",
                            timer: 4000
                        });
                </script>
                <?php }else {?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again',
                    timer: 7000
                    })
                </script><?php }
                	header('location:manage_students.php');
			
}else{
	header('location: manage_students.php');
}



if (isset($_GET['delete_course'])) {
    $coursedelete=mysqli_real_escape_string($conn,($_GET['delete_course']));

    $sql1="UPDATE courses SET delstatus=1 WHERE idCourse='$coursedelete'";
    $result1=mysqli_query($conn,$sql1);
    header('location: manage_courses_manager.php'); 
    if ($result1) { ?>
        <script>
                Swal.fire({
                    title: "Success..!",
                    text: "Program has been successfully Deleted ",
                    icon: "success",
                    button: "Aww yiss!",
                    timer: 4000
                });
        </script>
        <?php 
    

    }else {?>
            <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again',
                    timer: 7000
                    })
                </script><?php header('location:manage_courses_manager.php');
                }
			
}else{
	header('location:manage_courses_manager.php');
}



if (isset($_GET['delete_user'])) {
    $useredelete=mysqli_real_escape_string($conn,($_GET['delete_user']));

    $sql2="UPDATE users SET delstatus=1 WHERE idUsers='$useredelete'";
    $result2=mysqli_query($conn,$sql2);

    
    if ($result2) { ?>
        <script>
                Swal.fire({
                    title: "Success..!",
                    text: "Program has been successfully Deleted ",
                    icon: "success",
                    button: "Aww yiss!",
                    timer: 4000
                });
                window.location.replace("manage_users.php");
        </script>
        <?php 
    
    header('location: manage_users.php'); 
    }else {?>
            <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again',
                    timer: 10000
                    })

                </script><?php header('location:manage_users.php');
                }
			
}else{
	header('location:manage_users.php');
}





if (isset($_GET['delete_country'])) {
    $delete_country=mysqli_real_escape_string($conn,($_GET['delete_country']));

    $sql4="UPDATE country SET select_status=0 WHERE code='$delete_country'";
    $result4=mysqli_query($conn,$sql4);
    
    $sql5="DELETE FROM share WHERE countrycode='$delete_country'";
    $result5=mysqli_query($conn,$sql5);

    
    if ($result4) { ?>
        <script>
                Swal.fire({
                    title: "Success..!",
                    text: "Program has been successfully Deleted ",
                    icon: "success",
                    button: "Aww yiss!",
                    timer: 10000
                });
                window.location.replace("manage_users.php");
        </script>
        <?php 
    
    header('location: manage_users.php'); 
    }else {?>
            <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again',
                    timer: 7000
                    })
                </script><?php header('location:manage_users.php');
                }
			
}else{
	header('location:manage_users.php');
}





}

?>
