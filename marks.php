<?php 
include 'connect.php';
$id = $name = '';
// $name=$_SESSION['name'];
$sql = "SELECT * FROM `usertable`";
$result = mysqli_query($conn, $sql);

if ($result){
        $row = mysqli_fetch_array($result);
        $name=$row['name'];
        $maths=$row['maths'];
        $science=$row['science'];
        $chemistry=$row['chemistry'];
        $physics=$row['physics'];
        $biology=$row['biology'];
        $hindi=$row['hindi'];
        $english=$row['english'];
        $social=$row['social'];   
}
mysqli_close($conn);
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
                    <form METHOD="post" action="marksscript.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" required autocomplete="off">

                    <label for="maths">Maths</label>
                    <input type="number" name="maths" value="<?php echo $maths; ?>" required autocomplete="off">

                    <label for="science">Science</label>
                    <input type="number" name="science" value="<?php echo $science; ?>" required autocomplete="off">

                    <label for="chemistry">Chemistry</label>
                    <input type="number" name="chemistry" value="<?php echo $chemistry; ?>" required autocomplete="off">

                    <label for="physics">Physics</label>
                    <input type="number" name="physics" value="<?php echo $physics; ?>" required autocomplete="off">

                    <label for="biology">Biology</label>
                    <input type="number" name="biology" value="<?php echo $biology; ?>" required autocomplete="off">

                    <label for="english">English</label>
                    <input type="number" name="english" value="<?php echo $english; ?>" required autocomplete="off">

                    <label for="hindi">Hindi</label>
                    <input type="number" name="hindi" value="<?php echo $hindi; ?>" required autocomplete="off">
                    
                    <label for="social">Social</label>
                    <input type="number" name="social" value="<?php echo $social; ?>" required autocomplete="off">

                    <Button class="btn btn-warning" name="Register" style="margin:20px 0px; align-self:center;"> Update </Button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>