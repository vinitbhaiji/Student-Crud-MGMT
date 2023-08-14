<?php 
include 'connect.php';
$id = $name = $roll= $email = $role = $mobile = $class = $city= $state = $country = $image ='';
session_start(); 
$email=$_SESSION['email'];
$role=$_SESSION['role'];
if(($_SESSION['role']!='admission') && ($_SESSION['loggedin']!= true || $_SESSION['loggedin']!= 'true')  ){
    session_destroy();
    header('location:index.php');
}
include 'connect.php';
$sql = "SELECT * FROM `usertable` where role='user'";
$result = mysqli_query($conn, $sql);
if ($result){
    $row = mysqli_fetch_array($result);
    // print_r($row);
        $id=$row['id'];
        $name=$row['name'];
        $roll=$row['roll'];
        $email=$row['email'];
        $class=$row['class'];
        $country=$row['country'];
        $state=$row['state'];
        $city=$row['city'];
        $mobile=$row['mobile'];
        $image=$row['image'];   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Panel</title>
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
            <a class="nav-link" href="manageusers.php">Manage Users</a>
        </li>
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
        $sql="SELECT * FROM `usertable` where role='user'";
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

                <a href="javascript:void(0);" data-id="'.$id.'" class="text-light btn btn-secondary student" style="text-decoration:None;"><i class="fa-solid fa-graduation-cap" ></i></a>

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
</body>
</html>