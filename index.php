<?php 
session_start(); 
?>
<?php include_once('db/conn.php'); ?>

<?php

if (isset($_POST['login'])) {

  if (!isset($_POST['user_name']) || strlen(trim($_POST['user_name']))<1) {
    array_push($error, "<br><font color='red'>Missing / invalied User Name</font>");
  }
  if (!isset($_POST['pw']) || strlen(trim($_POST['pw']))<1) {
    array_push($error, "<br><font color='red'>Missing / invalied Password</font>");
  }

  if (count($error)==0) { 
    $user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
    $pw=mysqli_real_escape_string($conn,$_POST['pw']);
    // $epw=md5($pw);

    $sql="SELECT * FROM users WHERE pw='$pw' AND Username='$user_name' LIMIT 1";
    $result=mysqli_query($conn,$sql);

    if ($result) {
      if (mysqli_num_rows($result)==1) {
          $res=mysqli_fetch_assoc($result);

         $_SESSION['idUsers']=$res['idUsers'];
           $_SESSION['Username']=$res['Username'];
           $_SESSION['FName']=$res['FName'];
           $_SESSION['email']=$res['email'];
           $_SESSION['countrycode']=$res['countrycode'];
           $_SESSION['ustatus']=$res['ustatus'];
           $_SESSION['privilages']=$res['privilages'];
          
          header('location:home.php');
        }else{
          array_push($error,"Invalied user name  or password");
        } 
    }else{
      array_push($error,"Invalied user name  or password");
    }

  }
}
  
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Allied Login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="css/loginstyle.css" rel='stylesheet' type='text/css' media="all">
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <style>
      .img-right-side{
        display: table-cell;
        width: auto;
        background: url(images/login.png);
        background-size: 450px;
        background-repeat: no-repeat;
        background-position-x: center;
        background-position-y: center;

      }
    </style>
</head>

<body style="padding-top: 100px;">
    
    
    <div class="w3layouts-two-grids"  >
        <div class="mid-class">

            <div class="img-right-side"></div>
 
              <div class="txt-left-side">
                <img src="images/logo.png" alt="" style="background-size: 150px;">
                <!-- <h2>Login</h2> -->
                <!-- <p>PLEASE ENTER CORRECT USERNAME , PASSWORD AND THEN CLICK LOGIN BUTTON OR HIT ENTER</p> -->
                <form method="post" class="form-horizontal" autocomplete="off">
                <?php include_once('db/error.php'); ?>
                   
                      <div class="form-group">
                    
                        <!-- <span class="fa fa-user" aria-hidden="true"></span> -->
                        <input type="text" class="form-control" name="user_name" id="un" placeholder="User Name" required="">
                        <div class="clear"></div>
                      </div>
                    
                    
                      <div class="form-group">
                        <!-- <span class="fa fa-lock" aria-hidden="true"></span> -->
                        <input type="password" class="form-control" name="pw" id="pw" placeholder="Password" required="">
                        <div class="clear"></div>
                    </div>
                    <div class="main-two-w3ls">
                        
                    </div>   
                    <div class="form-group">
                    
                        <button type="submit" id="login" class="form-control" name="login" style="background-color: #4737AA;" >Login </button>
                   
                    </div>
                    
                  </form>
                  <a href="froget_pw.php">Forgot password?</a>
            </div>
        </div>
    </div>
    
</body>
    

</html>