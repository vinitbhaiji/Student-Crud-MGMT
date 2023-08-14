<?php 
include 'connect.php';
session_start(); 
$id=$_GET['id'];
// ($_SESSION['role']!='student') &&
if(($_SESSION['loggedin']!= true || $_SESSION['loggedin']!= 'true')  ){
    session_destroy();
    header('location:index.php');
}

$sql = "SELECT * FROM `usertable` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if ($result){
    $row = mysqli_fetch_array($result);
        $id=$row['id'];
        $class=$row['class'];
        $asubject=$row['asubject'];
}


if(isset($_POST['Register'])){ 
    $id=$_POST['id'];
    $class=$_POST['class'];
    $asubject=$_POST['asubject'];  

$sql = "UPDATE `usertable` SET `class`='$class',`asubject`='$asubject' WHERE id='$id'";
print_r($sql);
$result=mysqli_query($conn, $sql);
if($result){
    header('location:manageteachers.php');
}else{
    echo 'h';
}
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../studentcrud/crud.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
    <link rel="import" href="connect.php">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="card">
                <div class="cardbody"> 
                    <form METHOD="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">

                    <label for="class">class</label>
                    <input type="number" name="class" value="<?php echo $class; ?>" required autocomplete="off">

                    <label for="asubject">Subject</label>
                    <input type="text" name="asubject" value="<?php echo $asubject; ?>" required autocomplete="off">

                    <Button class="btn btn-warning" name="Register" style="margin:20px 0px; align-self:center;"> Update </Button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>