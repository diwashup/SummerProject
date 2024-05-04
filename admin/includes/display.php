<?php
include 'connection.php';
?>

<html>
  <head>
    <!-- Bootstra[ CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>CRUD</title>
  </head>
  <body>
  <div class="conatiner">
<button class="btn btn-primary my-5"> <a href="edit.php" class="text-light"> add
  </a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Address</th>

      <th scope="col">Operation</th>

    </tr>
  </thead>
  <tbody>

  <?php
  $sql="select * from customer";
  $result=mysqli_query($conn,$sql);
  if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id=$row['customer_id'];
    $name=$row['customer_username'];
    $email=$row['customer_email'];
    $password=$row['customer_password'];
    $address=$row['customer_address'];
    echo  '<tr>
       <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$password.'</td>
      <td>'.$address.'</td>

      <td>
  <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">update</a></button>
  <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'"class="text-light">delete</a></button>
  
</td>

     </tr>';

   }
  }



?>


  
  </tbody>
</table>


  </div>


  </body>
</html>