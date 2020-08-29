<?php

session_start();

$mysqli = new mysqli("localhost","root","","dwtube") or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$update = false;

if(isset($_POST['save'])){
    $name = $_POST['name_cat'];
    $mysqli->query("INSERT INTO catgory_tb (name) VALUES('$name')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!"; 
    $_SESSION['msg_type'] = "success"; 

    header("location: add_category.php");
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM catgory_tb WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!"; 
    $_SESSION['msg_type'] = "danger"; 

    header("location: add_category.php");
}
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM catgory_tb WHERE id=$id") or die($mysqli->error);
    
    $row = $result->fetch_array();
    $name = $row['name'];
}
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name_cat'];

    $mysqli->query("UPDATE catgory_tb SET name='$name' WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] =  "Record has been updated!"; 
    $_SESSION['msg_type'] = "warning";

    header("location: add_category.php");
}