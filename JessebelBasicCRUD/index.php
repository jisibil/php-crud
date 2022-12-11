<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>BASIC CRUD</title>
</head>
<body>
<div class="container d-flex justify-content-center my-3">
<center>
    <h1>Students List</h1>
    <br>
<table class="table">
        <thead>
            <tr style="color:white">
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
                $data = mysqli_query($connections, "SELECT * FROM student_list");
                while($row = mysqli_fetch_array($data)){
            ?>
            <tr style="color:white">
                <td><?php echo $no; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td></td>
                <td><?php echo $row['lastname']; ?></td>
                <td></td>
                <td><?php echo $row['department']; ?></td>
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
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>