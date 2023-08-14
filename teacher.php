<?php 
include 'connect.php';
$id = $name = $roll= $email = $role = $mobile = $class = $city= $state = $country = $image ='';
session_start(); 
$email=$_SESSION['email'];
$role=$_SESSION['role'];
if(($_SESSION['role']!='teacher') && ($_SESSION['loggedin']!= true || $_SESSION['loggedin']!= 'true')  ){
    session_destroy();
    header('location:index.php');
}
include 'connect.php';
$sql = "SELECT * FROM `usertable` where role='student'";
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
    <title>Teacher Panel</title>
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
    <a class="navbar-brand">Welcome Teacher</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="managestudents.php">Manage Students</a>
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
            <th>Assign Marks</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql="SELECT * FROM `usertable` where role='student'";
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

                <a href="marks.php?id='.$id.'" data-id="'.$id.'" class="text-light btn btn-secondary" style="text-decoration:None;" id="student"><i class="fa-regular fa-star"></i></a>

                </td>
                </tr>';
                }
            }
            ?>
    </tbody>
</table>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
    $('#student').on('click', function() {
            var id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: "roles.php",
                type: "POST",
                data: {
                    id:id
                },
                success: function(result){
                    $("#student").html(result);
                }
            });
    });
});
</script> -->
</body>
</html>