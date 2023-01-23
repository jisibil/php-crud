<?php

    $con=new mysqli('localhost', 'root', '', 'demo');

    if(!$con){
        die(mysqli_error($con));
    }

?>

<!-- USERS
JESSEBEL - 123 - ADMIN
MICHAEL - 456 - FACULTY
BENJIE - 789 STUDENT -->