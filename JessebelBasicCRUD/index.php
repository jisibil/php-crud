<?php
    
    session_start();

    include_once("conn.php");

    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $user = $connect->query($sql) or die ($connect->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;

    if($total > 0){
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];
            echo header("Location: index.php");
        }else{
            echo "<div class='message warning'>No user found.</div>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dist/bootstrap-5.0.2/css/bootstrap.min.css">
    <title>Faculty</title>
</head>
<body id='bg-img'>



    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>