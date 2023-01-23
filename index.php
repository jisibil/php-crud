<?php

    if(!isset($_SESSION)){
      session_start();
    }

    include_once("conn.php");
    

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "admin"){
        header('location: admin.php');
    }elseif(isset($_SESSION['Access']) && $_SESSION['Access'] == "faculty"){
        header('location: faculty.php');
    }elseif(isset($_SESSION['Access']) && $_SESSION['Access'] == "student"){
        header('location: student.php');
    }else{
        echo header("Location: login.php");
    }

?>
