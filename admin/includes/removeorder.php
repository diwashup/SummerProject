<?php
 include 'connection.php';
 if(isset($_GET['removeid'])){
  $id=$_GET['removeid'];
 }

 $sql="delete from orders where id=$id";

 $result=mysqli_query($conn,$sql);
 if($result){
  header('location:orders.php');

 }



?>