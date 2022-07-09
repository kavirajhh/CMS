<?php 
include('db/conn.php');

if (!isset($_SESSION['Username'])) {
	echo "<script>window.open('index.php','_self')</script>";
}else{

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">

    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Program Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> 

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.steps.css">
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">

    <!-- profile styles -->
    <link rel="stylesheet" href="css/profile_style.css">

    <!-- search selector -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/validation.css">
  </head>


<body class="app sidebar-mini">
  <div class="pre-loader"></div>
    <header class="app-header"><a class="app-header__logo" href="home.php"></a>

      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <ul class="app-nav">
            <li><a class="app-nav__item" href="user_profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="app-nav__item" href="log_out.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            <li><a class="app-nav__item" >
              <img  src="images/flags/<?php echo $_SESSION['countrycode'];  ?>.png" width=150% ></a></li>
      </ul>

    </header>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <div> 
          <img src="images/logo.png" alt="" width="200px">
        </div>
      </div>

    <ul class="app-menu">
      <li class=""><a class="app-menu__item" href="home.php"><i class="app-menu__icon fa fa-windows"></i><span class="app-menu__label">Home</span></a></li>
      <i class="fas fa-truck-loading"></i>



<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php 
$access=$_SESSION['privilages'];
  if (strpos($access, 'a') !== false) {
?>
       <!--
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Quotatios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="send_quotation.php "><i class="icon fa fa-plus"></i> Send Invoice / quotation</a></li>
            <li><a class="treeview-item" href="sent_quatations.php"><i class="icon fa fa-pencil"></i>Sent quotations</a></li>
          </ul>
        </li>

      -->
<?php }else{ ?>
  
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-envelope-o"></i><span class="app-menu__label">Quotatios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="send_quotation_manager.php "><i class="icon fa fa-plus"></i> Create Quotation</a></li>
            <li><a class="treeview-item" href="sent_quatations.php"><i class="icon fa fa-file"></i>Sent quotations</a></li>
          </ul>
        </li>

<!--        <li class="" >
          <a class="app-menu__item" href="sent_quatations.php " >
            <i class="app-menu__icon fa fa-envelope-o"></i>
            <span class="app-menu__label">Sent quotations</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 

        <li class="" >
          <a class="app-menu__item" href="send_quotation_manager.php " >
            <i class="app-menu__icon icon fa fa-plus"></i>
            <span class="app-menu__label">Create Quotation</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 
-->
<?php }?>




<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php 
$access=$_SESSION['privilages'];
  if (strpos($access, 'a') !== false) {
?>
        <!--
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Invoices</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="send_invoice_manager.php "><i class="icon fa fa-plus"></i> Send Invoice</a></li>
            <li><a class="treeview-item" href="manage_students.php"><i class="icon fa fa-pencil"></i>Sent Invoices</a></li>
          </ul>
        </li>
      -->
<?php }else{ ?>

        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Invoices</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="send_invoice_manager.php "><i class="icon fa fa-plus"></i> Create Invoice</a></li>
            <li><a class="treeview-item" href="manage_student_manager.php"><i class="icon fa fa-file"></i>Sent Invoices</a></li>
          </ul>
        </li>


<!--

        <li class="" >
          <a class="app-menu__item" href="manage_student_manager.php " >
            <i class="app-menu__icon icon icon fa fa-file"></i>
            <span class="app-menu__label">Sent Invoices</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 

        <li class="" >
          <a class="app-menu__item" href="send_invoice_manager.php " >
            <i class="app-menu__icon icon fa fa-plus"></i>
            <span class="app-menu__label">Create Invoice</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 
-->

<?php }?>




<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php 
$access=$_SESSION['privilages'];
  if (strpos($access, 'b') !== false) {
?>
        <!--
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-retweet"></i><span class="app-menu__label">Program</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="add-corse.php"><i class="icon fa fa-plus"></i>Add New Program</a></li>
            <li><a class="treeview-item" href="manage_courses.php"><i class="icon fa fa-pencil"></i>Edit Programs</a></li>
          </ul>
        </li>
    -->
<?php }else{?>


        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-retweet"></i><span class="app-menu__label">Program</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="add-corse.php"><i class="icon fa fa-plus"></i>Add New Program</a></li>
            <li><a class="treeview-item" href="manage_courses_manager.php"><i class="icon fa fa-pencil"></i>Edit Programs</a></li>
          </ul>
        </li>

<!--         <li class="" >
          <a class="app-menu__item" href="manage_courses_manager.php" >
            <i class="app-menu__icon icon fa fa-pencil"></i>
            <span class="app-menu__label">Edit Programs</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 
          <li class="" >
          <a class="app-menu__item" href="add-corse.php" >
            <i class="app-menu__icon icon fa fa-plus"></i>
            <span class="app-menu__label">Add New Program</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 
-->
<?php }?>




<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php 
$access=$_SESSION['privilages'];
  if (strpos($access, 'c') !== false) {
?>
<li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Users</span><i class="treeview-indicator fa fa-angle-right"></i>
        </a>
  
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="user_add.php"><i class="icon fa fa-plus"></i>Add New Users</a></li>
            <li><a class="treeview-item" href="manage_users.php"><i class="icon fa fa-pencil"></i>Edit Uses</a></li>
            <!--
            <li><a class="treeview-item" href="user_status.php"><i class="icon fa fa-circle-o"></i>User Satatus</a></li>
          -->
          </ul>
        </li>
        <?php } ?>



  
<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
<?php 
$access=$_SESSION['privilages'];
  if (strpos($access, 'd') !== false) {
?>
        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="report.php"><i class="icon fa fa-plus"></i>Sent invoices </a></li>
            <li><a class="treeview-item" href="view_quatations_admin.php"><i class="icon fa fa-pencil"></i>Sent quotations</a></li>
            <!-- comment on 20210808 
            <li><a class="treeview-item" href="invoice_report_manager.php"><i class="icon fa fa-plus"></i>Invoice Report</a></li>
            <li><a class="treeview-item" href="quotation_report_manager.php"><i class="icon fa fa-plus"></i>Quotation Report</a></li>
           add on 20210801 -->
          </ul>
        </li>
<?php }else{?>


        <li class="treeview" ><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-print"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="invoice_report_manager.php"><i class="icon fa fa-plus"></i>Invoice Report</a></li>
            <li><a class="treeview-item" href="quotation_report_manager.php"><i class="icon fa fa-plus"></i>Quotation Report</a></li>
           
          </ul>
<!--
           <li class="" >
          <a class="app-menu__item" href="quotation_report_manager.php" >
            <i class="app-menu__icon icon fa fa-print"></i>
            <span class="app-menu__label">Quotation Report</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 

         <li class="" >
          <a class="app-menu__item" href="invoice_report_manager.php" >
            <i class="app-menu__icon icon fa fa-print"></i>
            <span class="app-menu__label">Invoice Report</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li>
-->         
<?php }?>



<!-- ++++++++++++++Change bank details 20210803 +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


        <li class="" >
          <a class="app-menu__item" href="update_bankdetail.php" >
            <i class="app-menu__icon fa fa-bank"></i>
            <span class="app-menu__label">Bank Details</span>
          <i class=" fa fa-angle-right"></i>
          </a>
         </li> 

<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->

        <li class="" >
          <a class="app-menu__item" href="inv_footer.php" >
            <i class="app-menu__icon fa fa-id-card"></i>
            <span class="app-menu__label">Edit Footer</span>
            <i class=" fa fa-angle-right"></i>
          </a>
         </li> 



<!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->


<?php 
$access=$_SESSION['privilages'];
  if (strpos($access, 'e') !== false) {
?>
        <li class="">
          <a class="app-menu__item" href="countries.php">
            <i class="app-menu__icon fa fa-globe"></i>
            <span class="app-menu__label">Countries</span>
          <i class=" fa fa-angle-right"></i>
        </a></li>

        
        <li class="">
          <a class="app-menu__item" href="temp.php">
            <i class="app-menu__icon fa fa-globe"></i>
            <span class="app-menu__label">Summery Report</span>
          <i class=" fa fa-angle-right"></i>
        </a></li>
<?php } ?>
        
<hr>

<a href="https://heezi.net" class="app-menu__item" target="_blank">
<img src="images/heezi.png" width="60%" /> </a>
    </aside>
<!-- end of header -->
<main class="app-content">
<?php } ?>