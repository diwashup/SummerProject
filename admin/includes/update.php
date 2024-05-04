<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from customer where customer_id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['customer_username'];
$email=$row['customer_email'];
$password=$row['customer_password'];
$address=$row['customer_address'];




if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];

  $password=$_POST['pass'];

  $address=$_POST['add'];
  $sql="update  customer set customer_id=$id,customer_username='$name',customer_email='$email',customer_password='$password',customer_address='$address' where customer_id=$id ";
  $result=mysqli_query($conn,$sql);
  if($result){
    header('location:customers.php');
  }else{
    die(mysqli_error($conn));
  }
}

?>
<html>
  <head>
    <!-- Bootstra[ CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>CRUD</title>
  </head>
  <body>
  <div class="container">
  <form method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your name" name="name" value="<?php echo $name;?>">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Enter your email" name="email" value="<?php echo $email;?>">
</div>

<div class="form-group">
    <label>password</label>
    <input type="text" class="form-control" placeholder="Enter your password" name="pass" value="<?php echo $password;?>">
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" placeholder="Enter your address" name="add" value="<?php echo $address;?>">
</div>

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>


  </div>

  </body>



</html>