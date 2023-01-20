<?php
    
    session_start();

    include_once("conn.php");

    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $user = $connections->query($sql) or die ($connect->error);
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
    <title>LogIn</title>
</head>
<body id='bg-img'>
        <div class="container my-5">
        <div class="row">
            <div class="col-md-offset-5 col-md-4 text-center">
                <div class="form-login"></br>
                    <h4>Log In</h4>
                    </br>
                    <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username"/>
                    </br></br>
                    <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="password"/>
                    </br></br>
                    <div class="wrapper">
                            <span class="group-btn">
                                <a href="login.php" class="btn btn-primary btn-md">Log In <i class="fa fa-sign-in"></i></a>
                            </span>
                    </div>
                </div>
            </div>
        </div>


    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>