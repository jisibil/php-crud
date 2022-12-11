<?php

include 'conn.php';

$id = $_GET['deleteDataid'];
$sqlDELETE = "DELETE FROM student_list WHERE id = '$id' ";
mysqli_query($connections, $sqlDELETE);

header("location: index.php");

?>