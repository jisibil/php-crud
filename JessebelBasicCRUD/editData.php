<?php

    include 'conn.php';

    $id = $_GET['editDataid'];
    $sql = "SELECT * FROM `students_list` WHERE id=$id";
    $result = mysqli_query($connections, $sql);
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['Firstname'];
    $lastname = $row['Lastname'];
    $department = $row['Department'];

    if(isset($_POST['submit'])){
        $firstname = $_POST['Firstname'];
        $lastname = $_POST['Lastname'];
        $department = $_POST['Department'];

        $sql = "UPDATE `students_list` SET `id`='$id',`Firstname`='$firstname',`Lastname`='$lastname',`Department`='$department' WHERE id=$id";
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
    <title>Edit</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" name="Firstname" autocomplete="off" value=<?php echo $firstname ?> required>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" name="Lastname" autocomplete="off" value=<?php echo $lastname ?> required>
            </div>
            <div class="form-group">
                <label>Department</label>
                <input type="text" class="form-control"  name="Department" autocomplete="off" value=<?php echo $department ?> required>
            </div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="index.php" type="button" class="btn btn-danger">Back</a>
        </form>
    </div>
  </body>
</html>