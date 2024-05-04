<?php
$conn=mysqli_connect('localhost','root','','sp');
if(!$conn){
    die("Connection failed: ". mysqli_connect_errno());
}
?>