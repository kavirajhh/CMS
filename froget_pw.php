<?php 

?>
<?php include_once('db/conn.php'); 

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
     return $random_string;
}

$newpw=generate_string($permitted_chars, $strength = 10)

?>
<?php


if (isset($_POST['frogotpw'])) 
    {

        $email = $_POST['email'];
        
        // 20210810 $uid = $_POST['uid'];
        
        // get user info from database
        //20210810 $sql="SELECT * FROM users WHERE Username='".$uid."' AND email='".$email."' LIMIT 1";
        $sql="SELECT * FROM users WHERE email='".$email."' LIMIT 1";
        //$sql="SELECT * FROM users WHERE Username='Hemal' AND email='info@heezi.net' LIMIT 1";
        $result=mysqli_query($conn,$sql);

        while ($row_course=mysqli_fetch_array($result)) 
          {
              $FName = $row_course['FName'];
              $LName = $row_course['LName'];
              $uid = $row_course['Username'];
              $pw = $row_course['pw'];
              $email= $row_course['email'];
          }

        if($result->num_rows > 0)
          {   
              // Insert new  password
              $sql2 = "UPDATE users SET pw='".$newpw."' where email='".$email."'";
              $result2 = $conn->query($sql2);

             
              $header="From:admin@heezi.net\r\n";
              $txt = " Forgot password";
              $message="your new password is :'".$newpw."'";
              mail($email, $txt , $message, $header);
              $conn->close();
              header('location:index.php');
          }
        else{
              $conn->close();
              header('location:index.php');
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
        background: url(images/home1.png);
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
                <!-- <img src="images/logo.png" alt="" style="background-size: 150px;"> -->
                <h2>Forgot password ?</h2>
                <p>Please enter your email address</p>
                <form method="post" class="form-horizontal" autocomplete="off">
                <?php include_once('db/error.php'); ?>
                   
                      <div class="form-group">
                        
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="">
                        <div class="clear"></div>
                      </div>
                    
                     
<!-- 20210810
                      <div class="form-group">
                      
                        <input type="text" class="form-control" name="uid" id="uid" placeholder="User ID" required="">
                        <div class="clear"></div>
                      </div>

-->
                    <div class="main-two-w3ls">
                    </div>   
                    <div class="form-group">
                    
                        <button type="submit" id="frogotpw" class="form-control" name="frogotpw" style="background-color: #4737AA;" >Get Password</button>
        
                    </div>
                  </form>
            </div>
        </div>
    </div>
    
</body>
    

</html>