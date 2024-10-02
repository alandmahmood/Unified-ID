<?php require "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
<div class="container">
  <a class="navbar-brand" href="#">Universal ID</a>
  
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

    </div>
  </div>
  <a class="nav-item nav-link my-sm-2" href="add.php">Add citizen</a>
  </div>
</nav>
<hr>
<div class="container">
<table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>action</th>
    </thead>

    <tbody>
        <?php
            $select = "SELECT * FROM info";
            $result = mysqli_query($conn,$select);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                <td><?php echo $row["nid"];?></td>
                <td><?php echo $row["full_name"];?></td>
                <td>
                    <a href="NationalID.php?nid=<?php echo $row["nid"]; ?>" class="btn btn-primary btn-sm">National ID</i></a>
                    <a href="HealthID.php?hid=<?php echo $row["hid"]; ?>" class="btn btn-primary btn-sm">Health ID</i></a>
                    <a href="DrivingID.php?did=<?php echo $row["did"]; ?>" class="btn btn-primary btn-sm">Driving License</i></a>
                </td>
            </tr>
                
              <?php  
            }
            ?>
    </tbody>
    </table>
    </div>
<body>
    
</body>
</html>