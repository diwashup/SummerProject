<?php
include 'connection.php';
?>
<style>

.text{
    text-align: center; color:black; size: min;
    font-size: 15px;

}



.center{
    text-align: center;
    background-color: lightgray;
    font-size: 100px;


}
</style>
<?php include('C:/xampp/htdocs/SP/admin/includes/header.php');?>
<div class="container">
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="center" >Our Orders</h2>
            </div>
        </div>
    </div>
</div>
        


<html>
  <head>
    <!-- Bootstra[ CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>CRUD</title>
  </head>
  <body>
  <div class="conatiner">


</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Number</th>
      <th scope="col">Email</th>
      <th scope="col">Total Products</th>
      <th scope="col">Total price</th>

      <th scope="col"> Operation </th>


      

    </tr>
  </thead>
  <tbody>

  <?php
  $sql="select * from orders";
  $result=mysqli_query($conn,$sql);
  if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    $number=$row['number'];
    $email=$row['email'];
    $total_product=$row['total_products'];
    $total_price=$row['total_price'];

    echo  '<tr>
       <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$number.'</td>
      <td>'.$email.'</td>
      <td>' .$total_product.'</td>
      <td>'.$total_price.'</td>

      <td>
      <button class="btn btn-danger"><a href="removeorder.php? removeid='.$id.'"class="text-light">delete</a></button>

  

  
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
