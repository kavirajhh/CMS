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
function get_active_country_def($conn)

					{
							$country=array();
							$sql = "SELECT * FROM country WHERE select_status=1"; 
                                                        
                            $run_ins = mysqli_query($conn, $sql);
                                
                                while ($row=mysqli_fetch_array($run_ins)) 
                                    {
                                        $cid = $row['code'];
                                        array_push($country,$cid);
			
								}
								return $country;

		}

/****************************calculate total fees without discount for each country*******************************************/
// call from temp.php
function get_ini_def($conn,$id)
		{
			$sql1 = mysqli_query($conn, "SELECT * FROM student_registration where Country='".$id."'");			
								$subtotal=0;
								
								while ($row = $sql1->fetch_assoc())
									{
										$fee=$row['CourseFee'];
									
										$no_part=$row['no_part'];
									
										$subtotal=$subtotal+$fee*$no_part;

									}
								return $subtotal;

		}
	

/****************************calculate total discount for each country*******************************************/
// call from temp.php
function get_dis_def($conn,$id)
		{
			$sql1 = mysqli_query($conn, "SELECT * FROM student_registration where Country='".$id."'");			
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

function get_total_def($conn,$id)
		{
			$sql1 = mysqli_query($conn, "SELECT * FROM student_registration where Country='".$id."'");			
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

  function country_name_def($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM country where code='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $cname=$row['countryname'];
                                }
                                return $cname;

                    }




?>