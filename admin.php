<?php 
include 'connect.php';
session_start(); 
$email='email';
$role='role';
$_SESSION['email']=$email;
$_SESSION['role']=$role;
if(($_SESSION['role']!='admin') && ($_SESSION['loggedin']!= true || $_SESSION['loggedin']!= 'true')  ){
    session_destroy();
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../studentcrud/crud.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <link rel="import" href="connect.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand">Welcome to Student CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="admin.php"> Home </span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manageusers.php">Manage Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="managestudents.php">Manage Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manageteachers.php">Manage Teachers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="manageadmission.php">Manage Admission</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        </ul>
    </div>
    </nav>
    <?php
include 'connect.php';
?>
<div class="container-card">
<table class="styled-table">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Assign Role</th>
            <th>Operations</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql="SELECT * FROM `usertable`";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_array($result)){
                $id=$row['id'];
                $name=$row['name'];
                $email=$row['email'];

                echo '<tr>
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>

                <a href="javascript:void(0);" data-id="'.$id.'" class="text-light btn btn-secondary student" style="text-decoration:None;""><i class="fa-solid fa-graduation-cap" ></i></a>

                <a href="javascript:void(0);" data-id="'.$id.'" class="text-light btn btn-success teacher" style="text-decoration:None;""><i class="fa-solid fa-chalkboard-user" ></i></a>

                <a href="javascript:void(0);" data-id="'.$id.'" class="text-light btn btn-warning admission" style="text-decoration:None;""><i class="fa-solid fa-ticket"></i></a>

                </td>
                <td>
                <a href="read.php?id='.$id.'" class="text-light btn btn-dark" style="text-decoration:None;"> <i class="fa-solid fa-face-flushed"></i></a>

                    <a href="update.php?id='.$id.'" class="text-light btn btn-primary" style="text-decoration:None;"><i class="fa-regular fa-pen-to-square"></i></a>
                    

                    <a href="delete.php?id='.$id.'" class="text-light btn btn-danger btn_del" style="text-decoration:None; width:auto;" onclick="return (this);"> <i class="fa-solid fa-skull"></i></a>
                </td>
                </tr>';
                }
            }
            ?>
    </tbody>
</table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
    $('.student').on('click', function() {
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: "roles.php",
                type: "POST",
                data: {
                    id:id
                },
                success: function(result){
                    $(this).closest('tr').find('td:last').html(result);
                }
            });
    });
});
</script>
<script>
    $(document).ready(function() {
    $('.teacher').on('click', function() {
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: "rolet.php",
                type: "POST",
                data: {
                    id:id
                },
                success: function(result){
                    $(this).closest('tr').find('td:last').html(result);
                },
                error: function(xhr, status, error) {
                console.log("AJAX Request Error:", status, error);
                }
            });
    });
});
</script>
<script>
    $(document).ready(function() {
    $('.admission').on('click', function() {
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: "rolea.php",
                type: "POST",
                data: {
                    id:id
                },
                success: function(result){
                    $(this).closest('tr').find('td:last').html(result);
                }
            });
    });
});
</script>
</body>
</html>