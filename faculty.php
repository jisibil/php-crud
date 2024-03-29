<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

	<title>Login</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Students Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Firstname </label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter Firstname" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label> Lastname </label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Lastname" autocomplete="off" required>
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <input type="text" name="department" class="form-control" placeholder="Enter Department" autocomplete="off" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-dark">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Students Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Firstname </label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Firstname">
                        </div>

                        <div class="form-group">
                            <label> Lastname </label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Lastname">
                        </div>

                        <div class="form-group">
                            <label> Department </label>
                            <input type="text" name="department" id="d" class="form-control" placeholder="Enter Department">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-dark">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Students Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to delete this Data ?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> No </button>
                        <button type="submit" name="deletedata" class="btn btn-dark"> You successfully deleted the data! </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <center>
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <h1 style="text-align:center;" class='text-white'><b> Students List </b></h1>
                <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#studentaddmodal">Add data</button>
                <a class="btn btn-primary" href="logout.php" role="button">Logout</a>
                <?php
                    $con = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($con, 'demo');

                    $query = "SELECT * FROM students_list";
                    $query_run = mysqli_query($con, $query);
                ?>
                <table id="datatableid" class="table table-bordered table-info" style="text-align:center;">
                    <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Department</th>
                        </tr>
                    </thead>
                    <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                            {
                                ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $row['id']; ?> </td>
                                        <td> <?php echo $row['fname']; ?> </td>
                                        <td> <?php echo $row['lname']; ?> </td>
                                        <td> <?php echo $row['d']; ?> </td>
                                        <td>
                                            <button type="button" class="btn btn-dark editbtn">Edit</button>
                                            <button type="button" class="btn btn-danger deletebtn">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php           
                        }
                            }
                        else {
                            echo "No Record Found";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </center>


    <!-- Bootstrap Javascript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script src="main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>