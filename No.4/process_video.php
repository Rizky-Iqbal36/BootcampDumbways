<?php

session_start();

$mybase = new mysqli("localhost","root","","dwtube") or die(mysqli_error($mysqli));

$tell = false;
if(isset($_POST['upload'])){
    $tell = true;
    $_SESSION['message'] = "Video has been uploaded!"; 
    $_SESSION['msg_type'] = "success"; 
}