<?php

include_once("conn.php");
$db = mysqli_select_db($con, 'demo');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $department = $_POST['d'];

    $query = "INSERT INTO students_list (`fname`,`lname`,`d`) VALUES ('$fname','$lname','$department')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>