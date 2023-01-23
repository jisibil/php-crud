<?php

    $con=new mysqli('localhost', 'root', '', 'demo');

    if(!$con){
        die(mysqli_error($con));
    }

?>