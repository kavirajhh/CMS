<?php
 include_once('db/conn.php');

if(!empty($_POST)){

    $country=mysqli_real_escape_string($conn, $_POST["country"]);
    $c_rate=mysqli_real_escape_string($conn, $_POST["c_rate"]);
    $share=mysqli_real_escape_string($conn, $_POST["share"]);

    $sql="INSERT INTO share(countrycode,share) VALUES('$country','$share')";
    $run_Rproduct= mysqli_query($conn,$sql);

    $update_cun = "UPDATE country SET currency_rate='$c_rate',select_status=1
    WHERE  code='$country' LIMIT 1";
    $run_cun=mysqli_query($conn,$update_cun);
               
  }else{
    $output .= '<label class="text-success">Data Inserted</label>';
    echo $output;
  }
?>