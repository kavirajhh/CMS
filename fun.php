<?php 

// create database connection

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) 
		{
    		die("Connection failed: " . $conn->connect_error);
		}


// end create database connection
/****************************get available country id's from country table*******************************************/		
// call from temp.php
// function get_active_country($conn)

// 					{
// 							$country=array();
// 							$sql = "SELECT * FROM country WHERE select_status=1"; 
                                                        
//                             $run_ins = mysqli_query($conn, $sql);
                                
//                                 while ($row=mysqli_fetch_array($run_ins)) 
//                                     {
//                                         $cid = $row['code'];
//                                         array_push($country,$cid);
			
// 								}
// 								return $country;

// 		}

/****************************calculate total fees without discount for each country*******************************************/
// call from temp.php
function get_ini($conn,$start,$end,$select_country)
		{
			$sql1 = mysqli_query($conn, "SELECT * FROM student_registration where Country='".$select_country."' and date between '".$start."' and '".$end."'");			
								$subtotal=0;
								$subEUR=0;
								while ($row = $sql1->fetch_assoc())
									{
										$fee=$row['CourseFee'];
										$no_part=$row['no_part'];
										$dis=$row['discount'];
										$rate=$row['rate'];
										if($dis!=0){$dis=$fee*$dis/100;}
										$subtotal=($fee-$dis)*$no_part;
										$subEUR=$subEUR+($subtotal/$rate);
									}
								return $subEUR;
		}
	

/****************************calculate total discount for each country*******************************************/
// call from temp.php
function get_dis($conn,$start,$end,$select_country)
		{
			$sql1 = mysqli_query($conn, "SELECT * FROM student_registration where Country='".$select_country."' and date between '".$start."' and '".$end."'");			
								$subtotal=0;
								$discount=0;
								while ($row = $sql1->fetch_assoc())
								{
								$fee=$row['CourseFee'];
								$dis=$row['discount'];
								$no_part=$row['no_part'];

								if($dis!=0){$discount=$fee*$no_part*$dis/100;} //calculate discount for one invoice
															
								$subtotal=$subtotal+$discount;  // calculate total discount

								}
								return $subtotal;
		}

/****************************calculate grand totalafter apply discount for each country*******************************************/
// not yet call  temp.php

function get_total($conn,$start,$end,$select_country)
		{
			$sql1 = mysqli_query($conn, "SELECT * FROM student_registration where Country='".$select_country."' and date between '".$start."' and '".$end."'");			
								$subtotal=0;
								$gtotal=0;
								while ($row = $sql1->fetch_assoc())
								{
								$fee=$row['CourseFee'];
								$dis=$row['discount'];

								if($dis!=0){$fee=$fee-$fee*$dis/100;} //calculate payble course fees after discount 
								$no_part=$row['no_part'];

								$gtotal=$gtotal + $fee*$no_part; // calculate invoice payble value
								$subtotal=$subtotal+$fee;

								}
								return $gtotal;

		}

		
// ++++++++++++++++++++++++ get country +++++++++++++++++++++++++++++++++++++++
  function country_name($conn,$select_country)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM country where code='$select_country'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $cname=$row['countryname'];
                                }
                                return $cname;

                    }

// +++++++++++++++++++++++++++ getting each country share +++++++++++++++++++++++++
function get_share($conn,$select_country)
{
		$sql1 = mysqli_query($conn, "SELECT * FROM share where countrycode='$select_country'");
			while ($row = $sql1->fetch_assoc())
			{
			$id=$row['share'];
			}
			return $id;

}

?>