<?php

    require "connect.php";

    $country_id = $_POST["country_id"];
    print_r($country_id);


    $result = mysqli_query($conn,"SELECT * FROM states where country_id = $country_id");
?>

<option value="z">Select State</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
<?php
}
?>