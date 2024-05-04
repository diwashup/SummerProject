<?php
 include 'connection.php';
 if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
 }

 $sql="delete from customer where customer_id=$id";

 $result=mysqli_query($conn,$sql);
 if($result){
  header('location:customers.php');

 }



?>