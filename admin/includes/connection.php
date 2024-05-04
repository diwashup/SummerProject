<?php
$conn=new mysqli('localhost','root','','sp');

if(!$conn){
  die(mysqli_error($conn));
}

?>