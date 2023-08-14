<?php
session_start();
$_SESSION['loggedin']=false;
$_SESSION['email']=false;
if($_SERVER["REQUEST_METHOD"]=='POST'){
    include'connect.php';
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `usertable` WHERE email='$email' and password='$password'";

    $result= mysqli_query($conn,$sql);
    if($result)
    {
        $num=mysqli_num_rows($result);
        if($num>0){
            $row=mysqli_fetch_array($result);
            // print_r($result);
            if($row['role'] == 'student'){
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header('location:student.php');
            }
            elseif($row['role']=='teacher')
            {
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                $_SESSION['role']=$role;
                header('location:teacher.php');
            }
            elseif($row['role']=='admission')
            {
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                $_SESSION['role']=$role;
                header('location:admission.php');
            }
            elseif($row['role']=='admin')
            {
                $_SESSION['loggedin']=true;
                $_SESSION['email']=$email;
                header('location:admin.php');
            }
            elseif($row['role']=='user')
            {
                echo '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Student Crud</title>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                        <link rel="stylesheet" href="../studentcrud/crud.css">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
                        <link rel="import" href="connect.php">
                    </head>
                    <body>
                    <div class="container mt-5 col-lg-12" style="display:flex; justify-content:center; width:auto;">
                        <div class="card">
                            <div class="cardbody"> 
                                <div style="padding: 10px; width:auto;
                                height: 100%;
                                display: grid;
                                justify-content: center;
                                position: static;
                                vertical-align: middle;"><h2 class="text-light" style="font-size:30px;"> Role Not Assigned Yet</h2> 
                                <a href="index.php" type="submit" class="btn btn-danger" style="margin:20px 0px; align-self:center;"> Go Back </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    </body>
                    </html>
                ';
            }else{
                echo 'user not defined';
            }
        }else{
            header('location:index.php');
        }
    }
}
?>