<?php
session_start();
if($_SESSION['loggedin']==true){
session_destroy();
header('location:index.php');
}
?>