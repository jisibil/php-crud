<?php

  include_once('connections.php')

?>



<?php

  // Check for form submission
  if (isset($_POST['add'])) {
    // Add a new student
    $n = $_POST['name'];
    $d = $_POST['department'];
    $query = "INSERT INTO student_list (name, department) VALUES ('$n' , '$d')";
    $db->query($query);
  } elseif (isset($_POST['delete'])) {
    // Delete a student
    $id = $_POST['id'];
    $query = "DELETE FROM student_list WHERE id = $id";
    $db->query($query);
  } elseif (isset($_POST['edit'])) {
    // Edit a student
    $id = $_POST['id'];
    $n = $_POST['name'];
    $d = $_POST['department'];
    $query = "UPDATE student_list SET name = '$n', department = '$d' WHERE id = $id";
    $db->query($query);
  }

    // Get all students from the database
    $query = "SELECT * FROM student_list";
    $result = $db->query($query);
    $students = $result->fetch_all(MYSQLI_ASSOC);

?>

<?php
    include 'connections.php';
      $no =  1 ;
        $data = mysqli_query($db, "SELECT * FROM student_list");
        while($row = mysqli_fetch_array($data)){
?>

      <?php $no++; } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>BasicCRUD</title>
</head>
    <body>
    <!-- Display the student list -->
    <div class="container mt-5">
    <table class="table">
      <thead>
      <h2 class="p1" text align="center">Students List</h2>
          <td style="color:white;"><b>Name</b> </td>
          <td style="color:white;"><b>Department</b> </td>
        <?php foreach ($students as $student) : ?>
          <tr>
            <td style="color:white;"><?php echo $student['name']; ?></td>
            <td style="color:white;"><?php echo $student['department']; ?> </td>
            </tr>
        <?php endforeach; ?>
      </thead>
    </table>
          <br><br>
    <form action="index.php" method="post">
      <!-- Form to add a new student -->
      <h3 class="p1">Add new student</h3>
      <form method="post">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Department:</label>
        <input type="text" name="department" required>
        <button class="btn btn-primary" type="submit" name="add">Add Student</button>
      </form>
      <br>
      <!-- Form to delete a student -->
      <h3 class="p1">Delete student</h3>
      <form method="post">
        <label>ID:</label>
        <input type="number" name="id" required>
        <button class="btn btn-danger" type="submit" name="delete">Delete Student</button>
      </form>
      <br>
      <!-- Form to edit a student -->
      <h3 class="p1">Edit student</h3>
      <form method="post">
        <label>ID:</label>
        <input type="number" name="id" required>
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Department:</label>
        <input type="text" name="department" required>
        <button class="btn btn-success" type="submit" name="edit" >Edit Student</button>
      </form>
      </div>
    </form>
      </div>
  
    </body>
</html>