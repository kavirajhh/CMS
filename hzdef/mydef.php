<?php
function currency_rate($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM country where code='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $out=$row['currency_rate'];
                                if($out==0){$out=1;}
                                }
                                return $out;

                    }
function currency($conn,$id)
                    {
                            $sql1 = mysqli_query($conn, "SELECT * FROM country where code='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $out=$row['currency'];
                                return $out;

                    }
                }

function inv_no($conn,$id)
                    {
                    $sql1 = "SELECT *  FROM student_registration where invoiceno like'".$id."%'";
                    $result=mysqli_query($conn,$sql1);
					$id=$result->num_rows;
                            
                    return $id;
                    }
function quo_no($conn,$id)
                    {
                    $sql1 = "SELECT *  FROM student_registration2 where invoiceno like'".$id."%'";
                    $result=mysqli_query($conn,$sql1);
					$id=$result->num_rows;
                            
                    return $id;
                    }
function my_programs($conn,$id)
                    {
                    $sql1 = "SELECT *  FROM courses where countrycode='".$id."' and delstatus=0";
                    $result=mysqli_query($conn,$sql1);
					$id=$result->num_rows;
                            
                    return $id;
                    }

?>