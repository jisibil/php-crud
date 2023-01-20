<?php

include 'conn.php';

$firstname = $_POST['fn'];
$lastname = $_POST['ln'];
$department = $_POST['d'];
$sqlInsert = "INSERT INTO students_list (Firstname, Lastname, Department) VALUES('$firstname','$lastname','$department')";
mysqli_query($connections, $sqlInsert);

header("location: index.php");

?>