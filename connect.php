<?php
$conn= new mysqli ('localhost','root','','studentcrud');
if(!$conn){
    echo 'connection failed';
}
// if($conn){
//     echo "connection successful";
// }
// else{
//     die (mysqli_error($conn));
// }
?>