<?php

    include 'conn.php';

    $id = $_GET['editDataid'];
    $sql = "SELECT * FROM `student_list` WHERE id=$id";
    $result = mysqli_query($connections, $sql);
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $department = $row['department'];

    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $department = $_POST['department'];

        $sql = "UPDATE `student_list` SET `id`='$id',`firstname`='$firstname',`lastname`='$lastname',`department`='$department' WHERE id=$id";
        echo "Updated Successfully";
        $connections->query($sql) or die ($connections->error);
        header('location: index.php');
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css">
    <title>Student Form CRUD</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="firstname" autocomplete="off" value=<?php echo $firstname ?> required>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="lastname" autocomplete="off" value=<?php echo $lastname ?> required>
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" class="form-control"  name="department" autocomplete="off" value=<?php echo $department ?> required>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="index.php" type="button" class="btn btn-danger">Back</a>
        </form>
    </div>
  </body>
</html>