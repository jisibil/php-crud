<?php

    if(!isset($_SESSION)){
      session_start();
    }

    include_once("conn.php");
    

    if(isset($_SESSION['Access']) && $_SESSION['Access'] == "Admin"){
      echo "<div class='message success'>Welcome ".$_SESSION['Access']."</div><br/><br/>";
    }elseif(isset($_SESSION['Access']) && $_SESSION['Access'] == "Faculty"){
      echo "<div class='message success'>Welcome ".$_SESSION['Access']."</div><br/><br/>";
    }elseif(isset($_SESSION['Access']) && $_SESSION['Access'] == "Student"){
      echo "<div class='message success'>Welcome ".$_SESSION['Access']."</div><br/><br/>";
    }else{
        echo header("Location: login.php");
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

<div class="container d-flex justify-content-center my-3">
<center>
    <h1>Students List</h1>
    <br>
<table class="table">
        <thead>
            <tr style="color:black">
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th></th>
                <th scope="col">Lastname</th>
                <th></th>
                <th scope="col">Department</th>
                <th></th>
                <th></th>
                <th scope="col">Action</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        
        <?php
        include 'conn.php';
        $no =  1 ;
                $data = mysqli_query($connections, "SELECT * FROM students_list");
                while($row = mysqli_fetch_array($data)){
            ?>
            <tr style="color:black">
                <td><?php echo $no; ?></td>
                <td><?php echo $row['Firstname']; ?></td>
                <td></td>
                <td><?php echo $row['Lastname']; ?></td>
                <td></td>
                <td><?php echo $row['Department']; ?></td>
                <td></td>
                <td></td>
                <td><a type="button" class="btn btn-dark" href="deleteData.php?deleteDataid=<?php echo $row['id']?>">Delete</a></td>              
                <td><a type="button" class="btn btn-success" href="editData.php?editDataid=<?php echo $row['id']?>">Edit</a></td>
            </tr>
                    

                <?php $no++; } ?>
        
        </tbody>
    </table>
    <form action="insertData.php" method="post">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Firstname</label>
        <input name="fn" class="form-control form-control-lg" type="text" placeholder="Enter Firstname">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Lastname</label>
        <input name="ln" class="form-control form-control-lg" type="text" placeholder="Enter Lastname">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Department</label>
        <input name="d" class="form-control form-control-lg" type="text" placeholder="Department">
        </div>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>
</center>
</div>
  
    
    <script src="dist/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>