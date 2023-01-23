<?php
include_once("conn.php");
$db = mysqli_select_db($con, 'demo');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $department = $_POST['d'];

        $query = "UPDATE students_list FROM demo SET fname='$fname', lname='$lname', d='$department' WHERE id='$id'  ";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>