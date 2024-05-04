<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];

  $password=$_POST['pass'];

  $address=$_POST['add'];
  $sql="insert into customer(customer_username,customer_email,customer_password,customer_address)
  values('$name','$email','$password','$address')";
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
    <input type="text" class="form-control" placeholder="Enter your name" name="name">
</div>
<div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Enter your email" name="email">
</div>

<div class="form-group">
    <label>password</label>
    <input type="text" class="form-control" placeholder="Enter your password" name="pass">
</div>
<div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" placeholder="Enter your address" name="add">
</div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>


  </div>

  </body>



</html>