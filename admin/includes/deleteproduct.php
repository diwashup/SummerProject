<?php
 include 'connection.php';
 if(isset($_GET['deleteid'])){
  $id=$_GET['deleteid'];
 }

 $sql="delete from product where Product_id=$id";

 $result=mysqli_query($conn,$sql);
 if($result){
  header('location:products.php');

 }



?>