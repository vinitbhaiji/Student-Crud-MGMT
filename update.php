<?php 
include 'connect.php';
$id = $name = $roll= $email = $mobile = $class = $city= $state = $country = $image ='';
$id =$_GET['id'];
$sql = "select * from `usertable` where id='$id'";
$result = mysqli_query($conn, $sql);

if ($result){

    $row = mysqli_fetch_array($result);
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
mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Basic</title>
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
                    <form METHOD="post" action="updatescript.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" required autocomplete="off">

                    <label for="roll">Roll</label>
                    <input type="number" name="roll" value="<?php echo $roll; ?>" required autocomplete="off">

                    <label for="email">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off">
                    
                    <label for="class">Class</label>
                    <input type="text" name="class" value="<?php echo $class; ?>" required autocomplete="off">
                    
                    <div class="form-group">
                    <label for="country">Country</label>

                    <select id="country" name="country" class="form-control" required>
                    <option value="">Select Country</option>
                        <?php
                        require "connect.php";
                        $result = mysqli_query($conn,"SELECT * FROM `countries`");
                        while($row = mysqli_fetch_array($result)) { 
                        ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
                        <?php 
                        }
                        ?>
                    </select>
                        </div>
                        <div class="form-group">
                            
                    <label for="state">State</label>
                    <select name="state" class="form-control" id="state" req>

                    </select>
                    </div>
                    <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" class="form-control" id="city" req>
                    
                    </select>
                    </div>
                    <label for="mobile">Mobile</label>
                    <input type="tel" name="mobile"  value="<?php echo $mobile; ?>" required autocomplete="off">
                    
                    <label for="img">Image</label>
                    <input type="file" name="image" value="<?php echo $image; ?>" required autocomplete="off">

                    <!-- <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" required autocomplete="off">
                    
                    <label for="cp"> Confirm Password</label>
                    <input type="password" name="cp" placeholder="Confirm Password" required autocomplete="off">  -->

                    <Button class="btn btn-warning" name="Register" style="margin:20px 0px; align-self:center;"> Update </Button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function() {
    $('#country').on('change', function() {
            var country_id = this.value;
            console.log(country_id);
            $.ajax({
                url: "states-by-country.php",
                type: "POST",
                data: {
                    country_id: country_id
                },
                cache: false,
                success: function(result){
                    console.log(result);
                    $("#state").html(result);
                    $('#city').html('<option value="">Select State First</option>'); 
                }
            });
        
        
    });    
    $('#state').on('change', function() {
            var state_id = this.value;
            $.ajax({
                url: "cities-by-state.php",
                type: "POST",
                data: {
                    state_id: state_id
                },
                cache: false,
                success: function(result){
                    $("#city").html(result);
                }
            });
        
        
    });
});
</script>

</body>
</html>