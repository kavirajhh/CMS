<?php

function usermail($conn,$id)
        {
            $sql1 = mysqli_query($conn, "SELECT * FROM users where Username='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $umail=$row['email'];
                                }
                                return $umail;

        }

function coursename($conn,$id)
        {
            $sql1 = mysqli_query($conn, "SELECT * FROM courses where idCourse='".$id."'");
                                while ($row = $sql1->fetch_assoc())
                                {
                                $cname=$row['CName'];
                                }
                                return $cname;

        }

?>