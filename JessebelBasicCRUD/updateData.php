<?php
# Connect to the MySQL database
require_once 'conn.php';

# Get the form data
$firstname = $_POST['fn'];
$lastname = $_POST['ln'];
$department = $_POST['d'];
$id = $_POST['id'];

# Prepare the update query
$query = "UPDATE student_list SET firstname = '$firstname', lastname = '$lastname', department = '$department' WHERE id = '$id'";

# Execute the query
mysqli_query($conn, $query);

# Head back to index
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
